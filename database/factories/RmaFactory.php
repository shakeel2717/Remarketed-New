<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rma>
 */
class RmaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'customer_id' => $this->faker->numberBetween(1, 2),
            'warehouse_id' => $this->faker->numberBetween(1, 2),
            'status' => $this->faker->randomElement(['new', 'pending', 'approved', 'rejected']),
            'type' => $this->faker->boolean,
        ];
    }
}
