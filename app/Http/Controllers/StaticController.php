<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Shop;
use Exception;

class StaticController extends Controller
{
    public function postImage(Request $request)
    {
        Log::info('Request data:', $request->all());

        if ($request->hasFile('product_pic')) {
            $file = $request->file('product_pic');
            $fileName = $file->getClientOriginalName();
            if (empty($fileName)) {
                return response()->json(['error' => 'File name cannot be empty'], 400);
            }
            $path = $file->store('uploads/product_pic', 's3');
            $url = Storage::disk('s3')->url($path);

            $product = new Product();
            $product->image_name = $fileName;
            $product->image_path = $url;
            $product->name = $request->input('product-name');
            $product->manufacturer = $request->input('product-manufacturer');
            $product->JDD2021_code = $request->input('JDD2021-code');

            $product->FFPWD_code = $request->input('FFPWD-code');
            $product->UDF_code = $request->input('UDF-code');
            $product->SCF_code = $request->input('SCF-code');

            Log::info('Saving product:', $product->toArray());

            try {
                $product->save();
                Log::info('Product saved successfully');
            } catch (\Exception $e) {
                Log::error('Failed to save product:', ['error' => $e->getMessage()]);
                return response()->json(['error' => 'Failed to save product'], 500);
            }

            return response()->json(['url' => $url], 200);
        }

        return response()->json(['error' => 'File not uploaded'], 400);
    }
    public function postImageShopId(Request $request, $shopId)
    {
        Log::info('Request data:', $request->all());

        if ($request->hasFile('product_pic')) {
            $file = $request->file('product_pic');
            $fileName = $file->getClientOriginalName();
            if (empty($fileName)) {
                return response()->json(['error' => 'File name cannot be empty'], 400);
            }
            $path = $file->store('uploads/product_pic', 's3');
            $url = Storage::disk('s3')->url($path);

            $product = new Product();
            $product->image_name = $fileName;
            $product->image_path = $url;
            $product->name = $request->input('product-name');
            $product->manufacturer = $request->input('product-manufacturer');
            $product->JDD2021_code = $request->input('JDD2021-code');

            $product->FFPWD_code = $request->input('FFPWD-code');
            $product->UDF_code = $request->input('UDF-code');
            $product->SCF_code = $request->input('SCF-code');

            try {
                $product->save();
                Log::info('Product saved successfully');
            } catch (\Exception $e) {
                Log::error('Failed to save product:', ['error' => $e->getMessage()]);
                return response()->json(['error' => 'Failed to save product'], 500);
            }
            try {
                $shop = Shop::find($shopId);
                if ($shop) {
                    $shop->products()->attach($product->id);
                } else {
                    return response()->json(['error' => 'Shop not found'], 404);
                }
            } catch (\Exception $e) {
                Log::error('Failed to attach product to shop:', ['error' => $e->getMessage()]);
                return response()->json(['error' => 'Failed to attach product to shop'], 500);
            }
            return response()->json(['message' => 'Product created successfully', 'url' => $url], 201);
        }


        //     return response()->json(['message' => 'Product created successfully'], 201);

        //     Log::info('Saving product:', $product->toArray());

        //     try {
        //         $product->save();
        //         Log::info('Product saved successfully');
        //     } catch (\Exception $e) {
        //         Log::error('Failed to save product:', ['error' => $e->getMessage()]);
        //         return response()->json(['error' => 'Failed to save product'], 500);
        //     }

        //     $shop = Shop::find($shopId);
        //     if ($shop) {
        //         $shop->products()->attach($product->id);
        //     } else {
        //         return response()->json(['error' => 'Shop not found'], 404);
        //     }

        //     return response()->json(['url' => $url], 200);
        // }

        return response()->json(['error' => 'File not uploaded'], 400);
    }
}
