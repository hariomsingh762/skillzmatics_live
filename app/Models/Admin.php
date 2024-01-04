<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Accessor to split 'name' into 'first_name' and 'last_name'
    public function getFirstNameAttribute()
    {
        $name = explode(' ', $this->attributes['name']);
        return $name[0];
    }

    public function getLastNameAttribute()
    {
        $name = explode(' ', $this->attributes['name']);
        return isset($name[1]) ? $name[1] : '';
    }
}

