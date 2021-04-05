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
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getType()=="client"){
                return redirect()->route('home.index');
            }
    
            return $next($request);
        });
    }

    public function show($id)
    {   
        try
        {
            $user = User::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            return redirect('user.list');
        }

        return view('user.show')->with("data",$user);
        
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Display users";
        $data["users"] = User::orderBy('id')->get();

        return view('user.list')->with("data",$data);
    }

    public function delete(Request $request)
    {
        $request->validate([
            "id" => "required",
        ]);
        User::where('id',$request["id"])->delete();
        return redirect('user.list');
    } 
}
