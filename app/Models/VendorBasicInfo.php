<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorBasicInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'title',
        'meta_keywords',
        'meta_description',
        'logo',
        'favicon',
        'phone',
        'telephone',
        'fax',
        'email',
        'location',
        'address',
        'web_link',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'youtube_link',
        'assets_value',
        'total_employees',
        'total_companies',
        'start_year',
    ];
    protected $casts = [
        'meta_keywords' => 'string',
        'meta_description' => 'string',
        'assets_value' => 'integer',
        'total_employees' => 'integer',
        'total_companies' => 'integer',
        'start_year' => 'integer',
    ];


}
