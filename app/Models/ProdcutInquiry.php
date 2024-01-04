<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdcutInquiry extends Model
{
    use HasFactory;
    protected $table = 'product_inquiry';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'company_name',
        'phone',
        'city',
        'state',
        'What_describes_you_best',
        'hear_about_us',
        'message',
        'created_at',
        'updated_at',
    ];
}
