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
        $status = '';
        $message = '';

        if(Item::validation($request))
        {
            Item::create($request->all());
            $status = 'success';
            $message = 'Item created successfully!!';
        } else {
            $status = 'error';
            $message = 'Unable to create item';
        }
        
        return back()->with($status,$message);
    }


    public function delete(Request $request)
    {
        Item::validateId($request);
        Item::where('id',$request["id"])->delete();

        return redirect()->route('item.list')->with('success','Item deleted successfully!!');
    }
}