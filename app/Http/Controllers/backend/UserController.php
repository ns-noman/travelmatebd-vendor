<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\VendorRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Auth;
use Hash;

class UserController extends Controller
{
    protected $breadcrumb;
    public function __construct(){$this->breadcrumb = ['title'=>'Users'];}
    public function index()
    {
        $data['breadcrumb'] = $this->breadcrumb;
        return view('users.index', compact('data'));
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
        $data['vendor_roles'] = VendorRole::where('is_default','==', 0)->get();
        return view('users.create-edit',compact('data'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['vendor_id'] = $this->getVendorId();
        $data['password'] = Hash::make($data['password']);
        $user = User::where('email',$data['email'])->first();
        if($user){
            return redirect()->back()->with('alert',['messageType'=>'danger','message'=>'This email is already exists!']);
        }
        User::create($data);
        return redirect()->route('users.index')->with('alert',['messageType'=>'success','message'=>'User Inserted Successfully!']);
    }

    public function update(Request $request,$id)
    {
        $data = $request->all();

        $user = User::find($id);
        
        if($data['password']){
            $data['password'] = Hash::make($data['password']);   
        }else{
            unset($data['password']);
        }
        unset($data['conpassword']);
    
        $user->update($data);
        return redirect()->route('users.index')->with('alert',['messageType'=>'success','message'=>'User Updated Successfully!']);
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->update(['status'=>0]);
        return redirect()->back()->with('alert',['messageType'=>'success','message'=>'User Inactivated Successfully!']);
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
        $isMatch = Hash::check(
            $request->input('current_password'),
            $this->getUserInfo()->password
        );

        return response()->json([
            'is_match' => $isMatch ? 1 : 0
        ], 200);
    }

    public function updateDetails(Request $request, $id = null)
    {

        
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name'   => 'required|string|max:255',
                'mobile' => 'nullable|string|max:20',
            ]);
            $user = User::findOrFail($id);
            // Set upload paths from env
            $uploadPath = env('UPLOAD_PATH') . '/users/';
            $uploadUrl  = env('UPLOAD_URL') . '/users/';
            // Ensure directory exists
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }
            // Handle image upload
            if ($request->hasFile('image')) {
                $imageName = 'user-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move($uploadPath, $imageName);

                // Delete old image if exists
                if (!empty($user->image) && File::exists($uploadPath . $user->image)) {
                    File::delete($uploadPath . $user->image);
                }

                $validated['image'] = $imageName;
            }

            // Update user
            $user->update($validated);

            return redirect()->back()->with('alert', [
                'messageType' => 'success',
                'message'     => 'Data Updated Successfully!'
            ]);
        }
        // For GET request (load view)
        $user = $this->getUserInfo();
        $data['adminType']  = VendorRole::find($user->type)->role ?? 'N/A';
        $data['breadcrumb'] = ['title' => 'Profile'];
        return view('profile.profile', compact('data'));
    }




    public function login(Request $request){
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard.index');
        }
        if ($request->isMethod('post')) {
            
            $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
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
