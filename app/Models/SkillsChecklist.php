<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillsChecklist extends Model
{
    use HasFactory;
    protected $table = 'skills_checklist';

    public function parent()
    {
        return $this->belongsTo(SkillsChecklist::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(SkillsChecklist::class, 'parent_id');
    }
}


