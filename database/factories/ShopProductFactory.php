<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop_Product>
 */
class ShopProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'products_id' => fake() -> numberBetween(1, 10),
            'shops_id' => fake() -> numberBetween(1, 10),
        ];
    }
}
