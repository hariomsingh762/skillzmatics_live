<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'jobpost_id',
        'description',
        'contacted_date',
    ];

    // Define relationships with table names
    public function userResponse()
    {
        return $this->belongsTo('App\Models\UserResponse', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function jobpost()
    {
        return $this->belongsTo('App\Models\JobPosting', 'jobpost_id');
    }
}
