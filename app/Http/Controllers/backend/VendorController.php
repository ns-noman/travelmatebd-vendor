<?php

namespace App\Http\Controllers\backend;

use App\Models\Vendor;
use App\Models\User;
use App\Models\VendorRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Hash;

class VendorController extends Controller
{
    protected $breadcrumb;

    public function __construct()
    {
        $this->breadcrumb = ['title' => 'Vendors'];
    }

    // Display vendor list page
    public function index()
    {
        $data['breadcrumb'] = $this->breadcrumb;
        return view('vendors.index', compact('data'));
    }

    // Show create or edit form
    public function createOrEdit($id = null)
    {
        $data['breadcrumb'] = $this->breadcrumb;

        if ($id) {
            $data['title'] = 'Edit';
            $data['item'] = Vendor::findOrFail($id);
        } else {
            $data['title'] = 'Create';
        }

        return view('vendors.create-edit', compact('data'));
    }

    // Store new vendor
    public function store(Request $request)
    {
        $request->validate([
            'vendor_type' => 'required|in:airline,hotel,transport,tour_operator,other',
            'name' => 'required|string|max:191',
            'email' => 'nullable|email|max:191|unique:vendors,email',
            'phone' => 'nullable|string|max:50',
            'contact_person' => 'nullable|string|max:191',
            'address' => 'nullable|string|max:255', // added validation
            'country' => 'nullable|string|max:100',
            'commission_rate' => 'nullable|numeric|min:0',
            'status' => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $data = $request->only([
                'vendor_type', 'name', 'contact_person', 'phone', 'email', 'address', 'country', 'commission_rate', 'status'
            ]);

            $vendor = Vendor::create($data);

            $role = [
                'vendor_id' => $vendor->id,
                'is_superadmin' => true, // use boolean true
                'role' => 'Super Admin',
            ];
            VendorRole::create($role);

            $userData = [
                'vendor_id' => $vendor->id,
                'password' => Hash::make('12345'), // consider forcing password reset later
                'name' => $vendor->name,
                'type' => 1,
                'mobile' => $data['phone'] ?? null,
                'email' => $data['email'] ?? null,
                'status' => $vendor->status,
            ];
            User::create($userData);

            DB::commit();

            return redirect()->route('vendors.index')->with('alert', [
                'messageType' => 'success',
                'message' => 'Vendor created successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            
            \Log::error('Vendor creation failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->withErrors([
                'error' => 'Failed to create vendor: ' . $e->getMessage()
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);

        $request->validate([
            'vendor_type' => 'required|in:airline,hotel,transport,tour_operator,other',
            'name' => 'required|string|max:191',
            'email' => 'nullable|email|max:191|unique:vendors,email,' . $vendor->id,
            'phone' => 'nullable|string|max:50',
            'contact_person' => 'nullable|string|max:191',
            'address' => 'nullable|string|max:255', // added address validation for consistency
            'country' => 'nullable|string|max:100',
            'commission_rate' => 'nullable|numeric|min:0',
            'status' => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $data = $request->only([
                'vendor_type', 'name', 'contact_person', 'phone', 'email', 'address', 'country', 'commission_rate', 'status'
            ]);

            // Update vendor
            $vendor->update($data);

            // Update Role if needed (assuming vendor has one superadmin role)
            $role = VendorRole::where('vendor_id', $vendor->id)->where('role', 'Super Admin')->first();
            if ($role) {
                // Here you can update role properties if needed
                // For example, if you want to keep role name same, you might skip this
                $role->update([
                    'is_superadmin' => true,
                    // 'role' => 'Super Admin', // update if role name changes
                ]);
            }

            // Update User associated with vendor (assuming one user)
            $user = User::where('vendor_id', $vendor->id)->first();
            if ($user) {
                $userData = [
                    'name' => $vendor->name,
                    'email' => $data['email'] ?? $user->email,
                    'mobile' => $data['phone'] ?? $user->mobile,
                    'status' => $vendor->status,
                    // Note: not updating password here for safety
                ];
                $user->update($userData);
            }

            DB::commit();

            return redirect()->route('vendors.index')->with('alert', [
                'messageType' => 'success',
                'message' => 'Vendor updated successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            \Log::error('Vendor update failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->withErrors([
                'error' => 'Failed to update vendor: ' . $e->getMessage()
            ]);
        }
    }


    public function list(Request $request)
    {
        $query = Vendor::query();

        if (!$request->has('order')) {
            $query = $query->orderBy('id', 'desc');
        }

        return DataTables::of($query)->make(true);
    }
}
