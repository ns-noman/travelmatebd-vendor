<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function getUserInfo()
    {
        return Auth::guard('admin')->user();
    }
    public function getUserId()
    {
        return Auth::guard('admin')->user()->id;
    }
    public function getVendorId()
    {
        return Auth::guard('admin')->user()->vendor_id;
    }
}
