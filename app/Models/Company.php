<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companys";
    protected $fillable = [
        'name', 'email','phone','address','about','logo',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}




