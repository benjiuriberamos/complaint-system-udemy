<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Complaints;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplaintsFactory extends Factory
{
    protected $model = Complaints::class;

    public function definition()
    {
        $complainst = new Complaints();
        return [
            'owner_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'context' => $this->faker->sentence,
            'status' => $this->faker->randomElement(Complaints::STATUS_TYPES),
            'priority' => $this->faker->randomElement(Complaints::PRIORITY_TYPES),
            'category' => $this->faker->randomElement(Complaints::CATEGORY_TYPES),
            'id_user' => User::inRandomOrder()->first()->id,
            // 'id_user' => \App\Models\User::factory(),
        ];
    }
}