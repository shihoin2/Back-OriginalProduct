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
            'name' => fake() -> word(),
            'manufacturer' => fake() -> company(),
            'image_name' => fake() -> word(),
            'image_path' => fake() -> imageUrl(),
            'JDD2021_code' => fake() -> randomElement($array = ['0j','0t','1j','2-1','2-2','3','4']),
            'FFPWD_code' => fake() -> randomElement($array = ['L0','L3','L1','L2','L4']),
            'UDF_code' => fake() -> randomElement($array = ['かまなくてよい','舌でつぶせる','歯ぐきでつぶせる','容易にかめる']),
            'SCF_code' => fake() -> randomElement($array = ['0','1','2','3','4']),
            'reviews_id' => fake() -> numberBetween(1, 20),
        ];
    }
}
