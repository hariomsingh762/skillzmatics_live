<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SkillsChecklist;

class SkillsChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        SkillsChecklist::factory()->count(50)->create();
    }
}


