<?php

namespace Database\Factories\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rma_id' => 1,
            'user_id' => 1,
            'customer_id' => $this->faker->numberBetween(1, 2),
            'serial' => $this->faker->randomNumber(1),
            'model' => $this->faker->randomNumber(1),
            'issue' => fake()->name(),
            'price' => $this->faker->numberBetween(10, 1000),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'reason_id' => $this->faker->randomElement(['1', '2', '3', '4']),
        ];
    }
}
