<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    protected $fillable = [
        'company_id',
        'department',
        'title',
        'description',
        'location',
        'requirements',
        'posted_date',
        'deadline',
        'status',
    ];

    // Define a relationship with the Company model
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
