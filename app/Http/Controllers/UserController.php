<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(
            function ($request, $next) {
                if (Auth::user()->getType()=="client") {
                    return redirect()->route('home.index');
                }
    
                return $next($request);
            }
        );
    }

    public function show($id)
    {   
        try
        {
            $user = User::findOrFail($id);
        }
        catch (ModelNotFoundException $e)
        {
            return redirect('user.list');
        }

        return view('user.show')->with("data", $user);
        
    }

    public function list()
    {
        $data = [];
        $data["title"] = "Display users";
        $data["users"] = User::orderBy('id')->get();

        return view('user.list')->with("data", $data);
    }

    public function delete(Request $request)
    {
        $request->validate(
            [
            "id" => "required",
            ]
        );
        $user = User::findOrFail($request["id"]);
        $user->orders()->delete();
        $user->maintenances()->delete();
        $user->delete();
        return redirect()->route('user.list', 'name');
    } 
}
