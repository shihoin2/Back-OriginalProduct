<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Shop;

class PostImageShopId extends TestCase
{
    /**
     * A basic unit test example.
     */
    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }
    public function testAddProductToShop(): void
    {
        $shop = Shop::factory()->create([
            'name' => 'Test Shop',
            'address' => 'Test Address',
            'tel' => '10393848',
            'latitude' => 34.2342,
            'longitude' => 132.847,
        ]);


        $imageFile = UploadedFile::fake()->image('test.jpeg');


        $response = $this->postJson("/api/mogu_search/image/{$shop->id}", [
            'product_pic' => $imageFile,
            'image_name' => $imageFile->getClientOriginalName(),
            'image_path' => Storage::disk('s3')->url($imageFile->store('uploads/product_pic', 's3')),
            'product-name' => 'Test Product',
            'product-manufacturer' => 'Manufacture Name',
            'JDD2021-code' => 'JDD2021-code',
            'FFPWD-code' => 'FFPWD-code',
            'UDF-code' => 'UDF-code',
            'SCF-code' => 'SCF-code',
        ]);


        $response->assertStatus(201);


    }

}
