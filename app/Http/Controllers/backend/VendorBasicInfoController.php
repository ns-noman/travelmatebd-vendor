<?php

namespace App\Http\Controllers\backend;

use App\Models\VendorBasicInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VendorBasicInfoController extends Controller
{  
    protected $breadcrumb;

    public function __construct()
    {
        $this->breadcrumb = ['title' => 'Settings'];
    }

    public function index()
    {
        $data['basicInfo']  = VendorBasicInfo::where('vendor_id', $this->getVendorId())->first();
        $data['breadcrumb'] = $this->breadcrumb;

        return view('vendor-basic-infos.index', compact('data'));
    }

    public function edit($id)
    {
        $data['basicInfo']  = VendorBasicInfo::findOrFail($id);
        $data['breadcrumb'] = $this->breadcrumb;

        return view('vendor-basic-infos.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $basicInfo  = VendorBasicInfo::findOrFail($id);
        $data       = $request->except(['logo', 'favicon']);
        $uploadPath = env('UPLOAD_PATH') . '/vendor-basic-info/';

        // Ensure directory exists
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true, true);
        }

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            $logoName = 'logo-' . time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($uploadPath, $logoName);

            if (!empty($basicInfo->logo) && File::exists($uploadPath . $basicInfo->logo)) {
                File::delete($uploadPath . $basicInfo->logo);
            }

            $data['logo'] = $logoName;
        }

        // Handle Favicon Upload
        if ($request->hasFile('favicon')) {
            $faviconName = 'favicon-' . time() . '.' . $request->file('favicon')->getClientOriginalExtension();
            $request->file('favicon')->move($uploadPath, $faviconName);

            if (!empty($basicInfo->favicon) && File::exists($uploadPath . $basicInfo->favicon)) {
                File::delete($uploadPath . $basicInfo->favicon);
            }

            $data['favicon'] = $faviconName;
        }

        $basicInfo->update($data);

        return redirect()
            ->route('vendor-basic-infos.index')
            ->with('alert', [
                'messageType' => 'success',
                'message'     => 'Data Updated Successfully!'
            ]);
    }

}
