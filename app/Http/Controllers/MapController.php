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

    // public function getProductShop($id)
    // {
    //     $shops = Shop::find($id);
    //     return response()->json($shops);
    // }

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
        $product_info = Product::with(['reviews.user','shops'])->find($id);
        if (!$product_info) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product_info);
    }

    public function getAllProduct()
    {
        $product_info = Product::get();
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

    public function postShopInfo(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'tel' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        try {
            $shop = Shop::create($validatedData);

            return response()->json(['message' => '店舗が登録されました', 'shop' => $shop], 201);
        } catch (\Exception $e) {

            return response()->json(['message' => '店舗の登録中にエラーが発生しました', 'error' => $e->getMessage()], 500);
        }
    }
}
