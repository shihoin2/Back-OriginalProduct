<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\ShopProduct;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

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
        // $shop_info = Shop::with('products')->find($id);
        // $shop_info = Shop::with('products.reviews')->find($id);
        $shop_info = Shop::with('products.reviews.user')->find($id);
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
    public function postReviewAdd(Request $request)
    {

        $validateData = $request->validate([
            "content" => 'required|string',
            "rating" => 'required|integer',
            "product_id" => 'required|integer',
        ]);

        $userId = Auth::check() ? Auth::id() : null;

        $review = Review::create([
            "description" => $validateData["content"],
            "rating" => $validateData["rating"],
            "product_id" => $validateData["product_id"],
            // "user_id" => $userId,
            "user_id" => 3,
        ]);
        $review->load('user');
        return response()->json($review);
    }
}
