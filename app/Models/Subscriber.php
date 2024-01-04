<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    
    use HasFactory;
    protected $table = 'subscribers';
    protected $primaryKey = 'sid';
    protected $fillable = [
        'sid',
        'full_name',
        'description',
        'price',
        'original_price',
        'status',
        'created_at',
        'updated_at',  
    ];
}
