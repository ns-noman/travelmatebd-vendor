<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorPrivilege extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'vendor_id',
        'role_id',
        'menu_id',
    ];
    
}
