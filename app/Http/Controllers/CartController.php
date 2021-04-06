<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        $ids = $request->session()->get("products");
        $products = Product::whereIn('id', $ids)->get();
        $data["title"] = "Cart";
        $data["products"] = $products;

        return view("cart.index")->with("data", $data);
    }

    public function add($id, Request $request)
    {
        $products = $request->session()->get("products");
        $products[$id] = $id;
        $request->session()->put('products', $products);
        $request->session()->flash('success', 'Product added to yout cart!');
        return back();
    }

    public function remove($id, Request $request)
    {
        $products = $request->session()->get("products");
        unset($products[$id]);
        $request->session()->put('products', $products);
        $request->session()->flash('success', 'Product deleted from your cart!');
        return back();
    }

    public function removeALl(Request $request)
    {
        $request->session()->forget('products');
        $request->session()->flash('success', 'Your Cart has been emptied!');
        return back();
    }
}