<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\VendorRole;
use App\Models\VendorMenu;
use App\Models\VendorPrivilege;
use Illuminate\Support\Facades\Cache;

class AuthorizationService
{
    public function isAuthorized()
    {
        $user = Auth::guard('admin')->user();
        $is_superadmin = VendorRole::find($user->type)->is_superadmin;
        if (!$is_superadmin) {
            $currentRoute = \Route::current()->getName();
            $routes = VendorMenu::whereNotNull('route')->pluck('route')->toArray();
            
            if (in_array($currentRoute, $routes)) {
                $vendor_privileges = VendorPrivilege::join('vendor_menus', 'vendor_menus.id', '=', 'vendor_privileges.menu_id')
                    ->where('vendor_privileges.role_id', $user->type)
                    ->whereNotNull('vendor_menus.route')
                    ->pluck('vendor_menus.route')
                    ->toArray();
                return in_array($currentRoute, $vendor_privileges);
            }
        }
        return true;
    }


    public function hasMenuAccess($menu_id)
    {
        
        // Get the currently authenticated admin user
        $user_role_id = Auth::guard('admin')->user()->type;
        
        \Log::info(Cache::get("role_{$user_role_id}_vendor_privileges"));
        // Cache the role's is_superadmin status
        $is_superadmin = Cache::remember("role_{$user_role_id}_superadmin", 60, function () use ($user_role_id) {
            return VendorRole::find($user_role_id)->is_superadmin;
        });

        // Cache the vendor_privileges for the user's role
        $vendor_privileges = Cache::remember("role_{$user_role_id}_vendor_privileges", 60, function () use ($user_role_id) {
            return VendorPrivilege::join('vendor_menus', 'vendor_menus.id', '=', 'vendor_privileges.menu_id')
                            ->where('vendor_privileges.role_id', $user_role_id)
                            ->pluck('menu_id')->toArray();
        });
        // Check if the user is a superadmin or if the menu ID is in the user's vendor_privileges
        return $is_superadmin || in_array($menu_id, $vendor_privileges);
    }
}
