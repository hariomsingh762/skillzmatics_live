<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SkillsChecklist;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SkillsChecklist>
 */
class SkillsChecklistFactory extends Factory
{
    protected $model = SkillsChecklist::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'parent_id' => null, // You can modify this to create a hierarchical structure
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}



