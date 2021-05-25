<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Item;
use App\Models\Order;


class CartController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        if ($request->session()->get("products")) {
            $ids = $request->session()->get("products");
            $products = Product::whereIn('id', $ids)->get();

            $data["products"] = $products;
        }else {
            $data["products"] = null;
        }
        $data["title"] = "Cart";

        return view("cart.index")->with("data", $data);
    }

    public function add($id, Request $request)
    {
        $products = $request->session()->get("products");
        $products[$id] = $id;
        $request->session()->put('products', $products);
        $request->session()->flash('success', trans('cart.succssAdd'));
        return back();
    }

    public function remove($id, Request $request)
    {
        $products = $request->session()->get("products");
        unset($products[$id]);
        $request->session()->put('products', $products);
        $request->session()->flash('success', trans('cart.succssDel'));
        return back();
    }

    public function removeALl(Request $request)
    {
        $request->session()->forget('products');
        $request->session()->flash('success', trans('succssEmptied'));
        return back();
    }

}