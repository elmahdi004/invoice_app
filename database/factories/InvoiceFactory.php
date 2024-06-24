<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number'=> fake()->numberBetween(1,100),
            'customer_id'=> fake()->numberBetween(1,20),
            'date'=> fake()->date(),
            'due_date'=> fake()->date(),
            'reference'=> 'REF-200'.rand(1,100),
            'terms_and_conditions'=> fake()->paragraph(2),
            'sub_total'=> fake()->numberBetween(20,10000),
            'discount'=> fake()->numberBetween(10,100),
            'total'=> fake()->numberBetween(20,10000),
        ];
    }
}
