<?php

namespace App\Http\Controllers\backend;

use App\Models\BasicInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    protected $breadcrumb;

    public function __construct()
    {
        $this->breadcrumb = ['title' => 'Dashboard'];
    }

    public function index()
    {
        return view('index');
    }
}
