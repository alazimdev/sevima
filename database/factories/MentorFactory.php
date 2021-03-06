<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MentorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foto' => NULL,
            'profesi' => $this->faker->jobTitle(),
            'deskripsi' => $this->faker->paragraph(),
        ];
    }
}
