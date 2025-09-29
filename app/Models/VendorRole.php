<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorRole extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'vendor_id',
        'is_superadmin',
        'created_by',
        'role',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
