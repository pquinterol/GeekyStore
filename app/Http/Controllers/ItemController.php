<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Item;

class ItemController extends Controller

{

    public function show($id)
    {

        $data = []; 
        $item = Item::findOrFail($id);
        $data["title"] = $item->getId();
        $data["items"] = $item;

        
        return view('item.show')->with("data",$data);

    }

    public function list()
    {

        $data = []; 
        $data["title"] = "Create product";
        $data["items"] = Item::all();


        return view('item.list')->with("data",$data);

    }

    public function create()
    {

        $data = []; 
        $data["title"] = "Create product";
        $data["items"] = Item::all();


        return view('item.create')->with("data",$data);

    }
    

    public function save(Request $request)
    {

        Item::validation($request);
        $data = Item::create($request->only(["quantity","subtotal","product", "order"]));
        Session::flash('message', 'The item was created');
        
        return back();
    
    }


    public function delete($id)
    {

        Item::destroy($id);
        Session::flash('message', 'The product was removed');

        
        return redirect()->route('item.list');
    }


}