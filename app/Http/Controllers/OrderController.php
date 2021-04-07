<?php
 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Models\Order;
 use Illuminate\Support\Facades\Auth;
 use PDF;

 class OrderController extends Controller
 {
     public function __construct()
     {
        $this->middleware('auth');
     }

     public function create()
     {
         $data = [];
         $data['title'] = "Create Order";    //WARNING!!!     THIS MIGHT BE IMPLEMENTED USING LANG
         return view('order.create')->with("data",$data);
     }

     public function save(Request $request)
     {
        $status = '';
        $message = '';

        if(Order::validateData($request))
        {
            Order::create($request->all());
            $status = 'success';
            $message = 'Order created successfully!!';
        } else {
            $status = 'error';
            $message = 'Unable to create order';
        }

        return back()->with($status,$message);
     }

     public function show($id)
     {
        try
        {
            $order = Order::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            return redirect('/order/list');
        }

        return view('order.show')->with("data",$order);
     }

     public function delete(Request $request)
     {
        $id = $request->id;
        Order::where('id',$id)->delete();
        return redirect()->route('order.list', 'created_at')->with('success', 'Order deleted successfully!!');
     }

     public function listBy($param = 'created_at')
    {
        $data = []; 
        $data["title"] = "List Orders";
        if(Auth::user()->getType() == "admin") {
            $data["orders"] = Order::orderBy($param,'desc')->get();
        }
        else {
            $data["orders"] = Auth::user()->getOrders();
        }

        return view('order.list')->with("data",$data);
    }

   
    public function inProcess()
    {
        $data = []; 
        $data["title"] = "List discount Orders";
        if(Auth::user()->getType() == "admin") {
            $data["orders"] = Order::where('status', 'In Process')->get();
        }
        else {
            $data["orders"] = Auth::user()
                            ->getOrders()
                            ->intersect(
                                Order::where('status', 'In Process')->get()
                            );
        }
        return view('order.list')->with("data",$data);
    }

    public function download()
    {
        if(Auth::user()->getType() == 'admin')
        {
            $data = Order::all();
        }
        else {
            $data = Order::where('user', '=', Auth::user()->getID())->get();
        }
        $pdf = PDF::loadView('order.download', compact('data'));  

        return $pdf->download('Orders.pdf');
      
    }
 }