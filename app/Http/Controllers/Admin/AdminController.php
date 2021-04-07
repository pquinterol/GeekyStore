<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(
            function ($request, $next) {
                if(Auth::user()->getType()=="client") {
                    return redirect()->route('home.index');
                }
    
                return $next($request);
            }
        );
    }

    public function index()
    {
        return view('admin.controlPanel');
    }
}
