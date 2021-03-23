<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {   
        try
        {
            $user = User::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            return redirect('/user/display');
        }

        $data["fullName"] = $user->getFullName();
        $data["type"] = $user->getType();
        $data["username"] = $user->getUsername();
        $data["password"] = $user->getPassword();
        $data["id"] = $user->getId();     


        return view('user.show')->with("data",$data);
        
    }

    public function save(Request $request)
    {
        $request->validate([
            "fullname" => "required|between:2,40",
            "type" => "required",
            "username" => "required|between:6,16",
            "password" => "required|between:6,16"
        ]);
        User::create($request->only(["fullname","type","username","password"]));

        return back()->with('success','Item created successfully!');
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create user";

        return view('user.create')->with("data",$data);
    }

    public function display()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Display users";
        $data["users"] = User::orderBy('id')->get();

        return view('user.display')->with("data",$data);
    }

    public function delete(Request $request)
    {
        $request->validate([
            "id" => "required",
        ]);
        User::where('id',$request["id"])->delete();
        return redirect('/user/display');
    }


}
