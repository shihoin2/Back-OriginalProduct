<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\ShopProduct;
use App\Models\Product;

class MapController extends Controller
{
    public function test()
    {
        return response()->json('Hello from server!');
    }

    public function getShopMarker()
    {
        $shops = Shop::get();
        return response()->json($shops);
    }

    public function getShopInfo($id)
    {
        $shop_info = Shop::with('products')->find($id);
        if (!$shop_info) {
            return response()->json(['error' => 'Shop not found'], 404);
        }

        return response()->json($shop_info);
    }

    public function getProductInfo($id)
    {
        $product_info = Product::with('reviews.user')->find($id);
        if (!$product_info) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product_info);
    }
}
