<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class MapController extends Controller
{
    public function test()
    {
        return response()->json('Hello from server!');
    }
}
