<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_id' => 9,
            'product_id' => fake()->numberBetween(1,20),
            'price' => fake()->numberBetween(20,500),
            'quantity' => fake()->numberBetween(1,20),
        ];
    }
}
