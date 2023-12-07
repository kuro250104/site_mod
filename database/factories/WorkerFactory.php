<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WorkerFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => fake()->lastName(),
            'surname' => fake()->name(),
            'team_id' => null,
        ];
    }
}
