<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Wishlist;

class WishListController extends Controller
{
    public function show($id)
    {
        $data = []; 
        $wishlist = Wishlist::findOrFail($id);
        $data["title"] = $wishlist->getId();
        $data["wishlist"] = $wishlist;
        
        return view('wishlist.show')->with("data",$data);
    }

    public function list()
    {
        $data = []; 
        $data["title"] = "List Products wishlist";
        $data["wishlist"] = Wishlist::all();

        return view('wishlist.list')->with("data",$data);
    }

    public function create()
    {
        $data = []; 
        $data["title"] = "Add product wishlist";
        $data["wishlist"] = Wishlist::all();

        return view('wishlist.create')->with("data",$data);
    }
    

    public function save(Request $request)
    {   
        $status = '';
        $message = '';
        //echo $request["user"];

        if(Wishlist::validation($request))
        {
            Wishlist::create($request->all());
            $status = 'success';
            $message = 'add product in your wishlist successfully!!';
        } else {
            $status = 'error';
            $message = 'Unable to add product in your wishlist';
        }
        
        return back()->with($status,$message);
    }


    public function delete($id)
    {
        Wishlist::validateId($request);
        Wishlist::where('id',$request["id"])->delete();

        return redirect()->route('wishlist.list')->with('success','product deleted of your wishlist successfully!!');
    }

    #MissingFunctions
}
