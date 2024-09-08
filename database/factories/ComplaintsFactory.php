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
        return [
            'owner_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'context' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['pendiente', 'rechazado', 'culminado']),
            'priority' => $this->faker->randomElement(['Baja', 'Media', 'Alta']),
            'category' => $this->faker->randomElement(['Servicios', 'Otros', 'Tráfico de drogas']),
            'id_user' => User::inRandomOrder()->first()->id,
            // 'id_user' => \App\Models\User::factory(),
        ];
    }
}