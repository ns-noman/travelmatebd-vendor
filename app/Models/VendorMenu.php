<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorMenu extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'parent_id',
        'srln',
        'menu_name',
        'navicon',
        'has_child_menu',
        'is_side_menu',
        'create_route',
        'route',
        'status',
    ];
    public function parent()
    {
        return $this->belongsTo(VendorMenu::class, 'parent_id')->where('status',1)->orderBy('id','asc');
    }

    public function children()
    {
        return $this->hasMany(VendorMenu::class, 'parent_id')->where('status',1)->orderBy('srln','asc');
    }
    public function childrenmenu()
    {
        return $this->hasMany(VendorMenu::class, 'parent_id')->where('status',1)->orderBy('srln','asc');
    }
    public function childrenforcreatemenu()
    {
        return $this->hasMany(VendorMenu::class, 'parent_id')->where('status',1)->orderBy('srln','asc');
    }
}
