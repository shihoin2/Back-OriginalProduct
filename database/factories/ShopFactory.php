<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake() -> company(),
            'address' => fake() -> address(),
            'latitude' => fake() -> latitude($min = 34.62, $max = 34.7),
            'longitude' => fake() -> longitude($min = 135, $max = 135.2),
            // 'tel' => $this->faker -> phoneNumber,
            'tel' => fake() -> phoneNumber(),
        ];
    }
}
