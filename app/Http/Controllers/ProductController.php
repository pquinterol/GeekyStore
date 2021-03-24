<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'show', 'list'
        ]]);
        $this->middleware('admin', ['except' => [
            'show', 'list'
        ]]);
    }
    
    public function show($id)
    {
        try
        {
            $product = Product::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            return redirect('/product/list');
        }

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
        //$this->middleware('admin');        
        $data = []; 
        $data["title"] = "Create product";
        $data["products"] = Product::all();


        return view('product.create')->with("data",$data);
    }
    

    public function save(Request $request)
    {
        Product::validation($request);
        $data = Product::create($request->only(["name","price","discount","category","manufacturer","quantity","description"]));
        
        return back()->with('success','Item created successfully!');
    }

    public function delete(Request $request)
    {   
        $request->validate([
            "id" => "required",
        ]);
        Product::where('id',$request["id"])->delete();
        return redirect()->route('product.list')->with('success','Plane deleted successfully!!');
    }
}