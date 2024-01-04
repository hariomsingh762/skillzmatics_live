<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    use HasFactory;
    protected $fillable = ['checklist_id','unit_id', 'data_set'];

    public function skillUnit()
    {
        return $this->belongsTo(SkillUnit::class, 'unit_id', 'iid');
    }
}


