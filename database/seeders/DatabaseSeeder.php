<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use App\Models\Shop_Product;
use App\Models\ShopProduct;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ShopProduct::truncate();
        Product::truncate();
        Shop::truncate();
        Review::truncate();

        // $this->call([
        //     UserSeeder::class,
        //     ProductSeeder::class,
        //     ReviewSeeder::class,
        //     ShopProductSeeder::class,
        //     ShopSeeder::class
        // ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
