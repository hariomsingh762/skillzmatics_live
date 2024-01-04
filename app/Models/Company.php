<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'email',
        'phone',
        'password',
        'logo',
        'country',
        'state',
        'city',
        'zip',
        'address',
        'is_verify',
        'rand_id',
        'status',
    ];

    // Define the relationship with the JobPosting model
    public function jobPostings()
    {
        return $this->hasMany(JobPosting::class);
    }
}
