<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'id',
        'name',
        'site_logo',
        'description',
        'email',
        'copyright',
        'phone',
        'address',
        'social_link_data',
        'created_at',
        'updated_at',  
    ];
}
