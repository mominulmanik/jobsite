<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email','bussiness_name',
    ];
}
