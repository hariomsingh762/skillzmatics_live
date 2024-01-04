<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillsChecklistUnit extends Model
{
    use HasFactory;
    protected $table = 'skills_checklist_unit';

    protected $primaryKey = 'iid';

    protected $fillable = [
        'unit_name',
        'unit_slug',
        'cid',
        'description',
        'status',
    ];

    public function skillItems()
    {
        return $this->hasMany(SkillItem::class, 'unit_id', 'iid');
    }
}
