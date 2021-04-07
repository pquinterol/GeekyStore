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
        if ($request->session()->get("products")){
            $ids = $request->session()->get("products");
            $products = Product::whereIn('id', $ids)->get();

            $data["products"] = $products;
        }else{
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

    public function buyNow(Request $request)
    {   
        $status = '';
        $message = '';
        $ids = $request->session()->get("products");
        $products = Product::whereIn('id', $ids)->get();
        $total = 0;
        try{
            foreach($products as $product)
            {
                $total = $total + $product->getPrice();
            }
            $order = Order::create([
                'user'  => $request['user'],
                'price' =>  $total
            ]);

            foreach($products as $product)
            {   
                

                Item::create([
                'quantity'  => '1',
                'subtotal' => $product->getPrice(),
                'product'  => $product->getId(),
                'order'  => $order->getId()
                ]);
            }

            $request->session()->forget('products');
            $status = 'success';
            $message = 'Order created successfully!!';
            
        }catch(Exception $e){
            $status = 'error';
            $message = 'Unable to create order';
        }   
        
        
        

        return redirect()->route('order.list', 'created_at')->with($status,$message);
    }

}