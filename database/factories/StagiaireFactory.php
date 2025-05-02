<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stagiaire>
 */
class StagiaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastname(),
            'prenom' => $this->faker->firstname(),
            'date_naissance' => $this->faker->date(),
            'email' => $this->faker->email(),
            'ville' => $this->faker->city(),
            'note' => $this->faker->randomFloat(2, 0, 20),
            
        ];
    }
}
