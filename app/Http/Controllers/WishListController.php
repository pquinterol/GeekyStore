<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(
            'admin', ['except' => [
            'show',
            'save',
            'removeAll',
            'remove',
            ]]
        );
    }

    public function show($userId)
    {
        $data = []; 
        $data["title"] = trans('wishlist.list');
        $wishList = Wishlist::where('user', '=', $userId)->first();
        if ($wishList) {
            if (Auth::user()->getType() == "admin" && $userId != Auth::user()->getId()) {
                $data["header"] = trans('wishlist.list');
            }
            else {
                $data["header"] = trans('wishlist.yours');
            }
            $data["wishlist"] = $wishList;
            $data["wishlist"]["products"] = $wishList->getProducts();

            return view('wishlist.show')->with("data", $data);
        } 
        else {
            return redirect()->route('product.list', 'name')->with("error", trans('wishlist.isEmpty'));
        }
    }

    public function list()
    {
        $data = []; 
        $data["title"] = trans('wishlist.listTitle');
        $data["wishlists"] = Wishlist::all();

        return view('wishlist.list')->with("data", $data);
    }

    public function save(Request $request)
    {   
        $status = '';
        $message = '';

        if (Wishlist::validation($request)) {
            $wishList = Wishlist::firstOrCreate(
                [
                    'user' => $request->user,
                ]
            );
            $productId = $request->product;
            $ids = $wishList->products()->pluck('id');
            if (!$ids->contains($productId)) {
                $wishList->products()->attach($productId);
                $status = 'success';
                $message = trans('wishlist.productAdded');
            }
            else {
                $status = 'error';
                $message = trans('wishlist.alreadyAdded');
            }
        } else {
            $status = 'error';
            $message = trans('wishlist.notAdded');
        }
        
        return back()->with($status, $message);
    }

    public function remove($userId, $productId)
    {
        $wishList = Wishlist::where('user', '=', $userId)->first();
        $wishList->products()->detach($productId);
        return back()->with('success', trans('wishlist.productDeleted'));
    }

    public function removeAll($userId)
    {
        $wishList = Wishlist::where('user', '=', $userId)->first();
        $wishList->products()->detach();
        return back()->with('success', trans('wishlist.emptied'));
    }
}
