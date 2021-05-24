<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function getDiscounts()
    {
        $data = Product::where('discount', '>', 0)->select('name', 'price', 'discount', 'category', 'manufacturer', 'quantity', 'description')->get();
        return response()->json(['products' => $data]);
    }

}
