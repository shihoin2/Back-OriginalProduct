<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MapController;
use App\Http\Controllers\StaticController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('mogu_search')
    ->name('mogu_search.')
    ->controller(MapController::class)
    ->group(function () {
        // Route::get('/', 'index')->name('index');
        // Route::post('/', 'create')->name('create');
        // Route::post('/{board_id}', 'imageStore')->name('imageStore');
        // Route::patch('/capture/{board_id}', 'thumbnailPatch')->name('thumbnailPatch');
        // Route::get('/{id}', 'edit')->name('edit');
        // Route::put('/{id}', 'update')->name('update');
        // Route::delete('/{id}', 'destroy')->name('destroy');
        Route::get('/shop', 'getShopMarker')->name('getShopMarker');
        Route::get('/shop/{shop_id}', 'getShopInfo')->name('getShopInfo');
        Route::get('/product/{product_id}', 'getProductInfo')->name('getProductInfo');
        Route::post('/reviews', 'postReviewAdd')->name('postReviewAdd');
        // Route::post('/reviews/{product_id}', 'postReviewAdd')->name('postReviewAdd');
    });
Route::prefix('mogu_search')
    ->name('mogu_search.')
    ->controller(StaticController::class)
    ->group(function () {
        Route::post('/image', 'postImage')->name('postImage');
        Route::post('/image/{shopId}', 'postImageShopId')->name('postImageShopId');
    });

    Route::get('/csrf-token', function () {
        return response()->json(['csrf_token' => csrf_token()]);
    });

// Route::get('/test', [MapController::class, 'test']);
