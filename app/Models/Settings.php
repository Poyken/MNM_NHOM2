<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'logo',
        'photo',
        'description',
        'address',
        'phone',
        'email'
    ];
}
