<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class ProductController extends Controller

{

    public function show($id)
    {

        $data = []; 
        $product = Product::findOrFail($id);
        $data["title"] = $product->getName();
        $data["product"] = $product;

        
        return view('product.show')->with("data",$data);

    }

    public function list()
    {

        $data = []; 
        $data["title"] = "Create product";
        $data["products"] = Product::all();


        return view('product.list')->with("data",$data);

    }

    public function create()
    {

        $data = []; 
        $data["title"] = "Create product";
        $data["products"] = Product::all();


        return view('product.create')->with("data",$data);

    }
    

    public function save(Request $request)
    {

        Product::validation($request);
        $data = Product::create($request->only(["name","price","discount","category","manufacturer","quantity","description"]));
        Session::flash('message', 'The product was created');
        
        return back();
    
    }


    public function delete($id)
    {

        Product::destroy($id);
        Session::flash('message', 'The product was removed');

        
        return redirect()->route('product.list');
    }


}