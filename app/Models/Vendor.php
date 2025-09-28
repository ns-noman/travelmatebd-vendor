<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_type',       // enum: airline, hotel, transport, tour_operator, other
        'name',              // string
        'contact_person',    // string, nullable
        'phone',             // string, nullable
        'email',             // string, nullable
        'address',           // text, nullable
        'country',           // string, nullable
        'commission_rate',   // decimal, nullable
        'status'             // tinyInteger, default 1
    ];

}
