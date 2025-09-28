<?php

namespace App\Http\Controllers\backend;

use App\Models\VendorMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorMenuController extends Controller
{
    protected $breadcrumb;
    public function __construct(){$this->breadcrumb = ['title'=>'Admin Menu'];}
    public function index()
    {
        $data['menus'] = VendorMenu::with('childrenforcreatemenu.childrenforcreatemenu.childrenforcreatemenu.childrenforcreatemenu')->where('parent_id',0)->orderBy('srln','asc')->get()->toArray();
        $data['breadcrumb'] = $this->breadcrumb;
        return view('menus.vendors.index',compact('data'));
    }
    public function createOrEdit($id=null,$addmenu=null)
    {
        if($addmenu){
            $data['title'] = 'Create';
            $data['addmenu'] = VendorMenu::find($id)->toArray();
        }else if($id){
            $data['title'] = 'Edit';
            $data['item'] = VendorMenu::find($id)->toArray();
        }else{
            $data['title'] = 'Create';
        }
        $data['menus'] = VendorMenu::with('children.children.children.children')->where('parent_id',0)->orderBy('srln','asc')->get()->toArray();
        $data['breadcrumb'] = $this->breadcrumb;
        return view('menus.vendors.create-or-edit',compact('data'));
    }
    public function store(Request $request)
    {
        $data = $request->all();

        if(!$data['srln']) $data['srln'] =  VendorMenu::where('parent_id', $data['parent_id'])->max('srln') + 1;
        $data['is_side_menu'] = isset($data['is_side_menu']) ? 1 : 0;
        $data['status'] = isset($data['status']) ? 1 : 0;
        VendorMenu::create($data);
        return redirect()->route('menus.vendors.index')->with('alert',['messageType'=>'success','message'=>'Data Inserted Successfully!']);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['is_side_menu'] = isset($data['is_side_menu']) ? 1 : 0;
        $data['status'] = isset($data['status']) ? 1 : 0;
        VendorMenu::find($id)->update($data);
        return redirect()->route('menus.vendors.index')->with('alert',['messageType'=>'success','message'=>'Data Inserted Successfully!']);
    }
    public function destroy($id)
    {
        $menu = VendorMenu::find($id);
        $menu->destroy($id);
        return redirect()->back()->with('alert',['messageType'=>'success','message'=>'Data Deleted Successfully!']);
    }
}
