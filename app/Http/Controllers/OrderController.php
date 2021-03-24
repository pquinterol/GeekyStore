<?php
 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Models\Order;

 class OrderController extends Controller
 {
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
        $validated = $request->validate([
            "price" => "required|numeric|gt:0",
        ]);

        if($validated)
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
        $data = [];
        $order = Order::findOrFail($id);

        $data["title"] = "Order:".$order->getId();
        $data["order"] = $order;
        return view('order.show')->with("data",$data);
     }

     public function list()
     {
        $data = [];
        $data["title"] = "create order";
        $data["orders"] = Order::all();
        return view('order.list')->with('data',$data);
     }

     public function delete(Request $request)
     {
        $id = $request->id;
        Order::where('id',$id)->delete();
        return redirect()->route('order.list')->with('success','Plane deleted successfully!!');
     }
 }