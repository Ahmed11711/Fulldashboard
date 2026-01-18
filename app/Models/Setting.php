<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo', 'favicon', 'businessName', 'supportEmail', 
        'paymentPhoneNumber', 'address', 'socialLinks', 'theme'
    ];

    protected $casts = [
        'socialLinks' => 'array',
        'theme' => 'array',
    ];
}
