<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'name' => $this->faker->unique()->sentence(1),
            'description' => $this->faker->paragraph(1),
            'price' => $this->faker->randomFloat(1, 1, 1000),
        ];
    }
}
