<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'show', 'listBy'
        ]]);
        $this->middleware('admin', ['except' => [
            'show', 'listBy', 'rate'
        ]]);
    }
    
    public function show($id)
    {
        try
        {
            $data = Product::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            return redirect('product.list', 'name');
        }

        return view('product.show')->with("data",$data);
    }

    public function listBy($request)
    {
        $data = []; 
        $data["title"] = "List products";
        $data["products"] = Product::orderBy($request)->get();

        return view('product.list')->with("data",$data);
    }

    public function search(Request $request)
    {   
        Product::validateName($request);
        $product = $request->get('name');
        $query = Product::where('name', 'LIKE','%' . $product . '%')->get();
        $data = []; 
        $data["title"] = "List products";
        $data["products"] = $query;

        return view('product.search')->with("data",$data);
    }
   
    public function listDiscountOnly()
    {
        $data = []; 
        $data["title"] = "List discount productss";
        $data["products"] = Product::where('discount', '>',0)->orderBy('discount','desc')->get();

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
        $status = '';
        $message = '';

        if(Product::validation($request))
        {
            Product::create($request->all());
            $status = 'success';
            $message = 'Product created successfully!!';
        } else {
            $status = 'error';
            $message = 'Unable to create product';
        }
        
        return back()->with($status,$message);
    }

    public function delete(Request $request)
    {   
        Product::validateId($request);
        Product::where('id',$request["id"])->delete();

        return redirect()->route('product.list')->with('success','Product deleted successfully!!');
    }

    public function rate($productId, $rating)
    {
        try
        {
            $product = Product::findOrFail($productId);
            $newRating = $product->calcRating($rating);
            $product->setRating($newRating);
            $product->setRates($product->getRates()+1);
            $product->save();
        }
        catch(ModelNotFoundException $e)
        {
            return redirect('product.list', 'name');
        }

        return back()->with('data', $product);
    }
}