<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Auth;
use Hash;

class AdminController extends Controller
{
    protected $breadcrumb;
    public function __construct(){$this->breadcrumb = ['title'=>'Users'];}
    public function index()
    {
        $data['breadcrumb'] = $this->breadcrumb;
        return view('admins.index', compact('data'));
    }
    public function createOrEdit($id=null)
    {
        if($id){
            $data['title'] = 'Edit';
            $data['item'] = User::find($id);
        }else{
            $data['title'] = 'Create';
        }
        $data['breadcrumb'] = $this->breadcrumb;
        $data['vendor_roles'] = Role::where('is_default','==', 0)->get();
        return view('admins.create-edit',compact('data'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $admin = User::where('email',$data['email'])->first();
        if($admin){
            return redirect()->back()->with('alert',['messageType'=>'danger','message'=>'This email is already exists!']);
        }
        $data['password'] = Hash::make($data['password']);
        $data['mobile'] = 'User';
        $data['mobile'] = '01839317038';
        User::create($data);
        return redirect()->route('admins.index')->with('alert',['messageType'=>'success','message'=>'User Inserted Successfully!']);
    }

    public function update(Request $request,$id)
    {
        $data = $request->all();

        $admin = User::find($id);
        
        if($data['password']){
            $data['password'] = Hash::make($data['password']);   
        }else{
            unset($data['password']);
        }
        unset($data['conpassword']);
    
        $admin->update($data);
        return redirect()->route('admins.index')->with('alert',['messageType'=>'success','message'=>'User Updated Successfully!']);
    }
    
    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->update(['status'=>0]);
        return redirect()->back()->with('alert',['messageType'=>'success','message'=>'User Inactivated Successfully!']);
    }

    public function updateDetails(Request $request, $id=null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            if(isset($data['image'])){
                $image = 'admin-'. time().'.'.$data['image']->getClientOriginalExtension();
                $data['image']->move(public_path('uploads/admin'), $image);
                $data['image'] = $image;
                if (Auth::guard('admin')->user()->image) {
                    $oldFile = public_path('uploads/admin/' . Auth::guard('admin')->user()->image);
                    if (!empty(Auth::guard('admin')->user()->image) && File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
            }
            User::find($id)->update($data);
            return redirect()->back()->with('alert',['messageType'=>'success','message'=>'Data Updated Successfully!']);
        }
        $data['adminType'] = Role::find(Auth::guard('admin')->user()->type)->role;
        $data['breadcrumb'] = ['title'=> 'Profile'];
        return view('profile.profile',compact('data'));
    }
    public function updatePassword(Request $request, $id=null)
    {
        if($request->isMethod('post'))
        {
            $data = User::find($id)->update(['password'=>Hash::make($request->new_password)]);
            return response()->json(['is_updated'=> 1], 200);
        }
        $data['breadcrumb'] = ['title'=> 'Update Password'];
        return view('update-password.update-password',compact('data'));
    }

    public function checkPassword(Request $request)
    {
        if(Hash::check($request->current_password, Auth::guard('admin')->user()->password)){
            $is_match = 1;
        }else{
            $is_match = 0;
        }
        return response()->json(['is_match'=> $is_match], 200);
    }

    public function login(Request $request){
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard.index');
        }
        // dd(Auth::guard('admin')->check());
        if ($request->isMethod('post')) {
            
            $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
                // 'g-recaptcha-response' => 'required',
            ], [
                'email.email' => 'Please enter a valid email',
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
            ]);

            $credentials = $request->only('email', 'password');
            $credentials['status'] = 1;
            $remember = $request->filled('remember_me');
            if (Auth::guard('admin')->attempt($credentials, $remember)) {
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->back()->withInput()->withErrors([
                    'email' => 'Invalid credentials or account not active.',
                ]);
            }
        }
        return view('auth.login');        
    }
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    
    public function allAdmins(Request $request)
    {
        $query = User::join('vendor_roles', 'vendor_roles.id', '=', 'users.type')
                    ->where('users.vendor_id', $this->getVendorId())
                    ->select('users.id', 'users.name', 'vendor_roles.role', 'users.mobile', 'users.email', 'users.status');
                    if(!$request->has('order')) $query = $query->orderBy('id','desc');
        return DataTables::of($query)->make(true);
    }

}
