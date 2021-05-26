<?php
 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Models\Order;
 use App\Models\Product;
 use App\Models\Item;
 use Illuminate\Support\Facades\Auth;
 use PDF;

 use App\Interfaces\PaymentMethod;

class OrderController extends Controller
{
    private $paymentMethod;

    public function __construct()
    {
        $this->middleware('auth');
        $this->paymentMethod = app(PaymentMethod::class);
    }

    public function create()
    {
        $data = [];
        $data['title'] = "Create Order";    //WARNING!!!     THIS MIGHT BE IMPLEMENTED USING LANG
        return view('order.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        $response = [];

        $ids = $request->session()->get("products");
        $products = Product::whereIn('id', $ids)->get();
        $total = 0;
        try{
            foreach ($products as $product)
            {
                $total = $total + $product->getPrice();
            }

            $order = Order::create(
                [
                'user'  => $request['user'],
                'price' =>  $total
                ]
            );

            foreach ($products as $product)
            {   
                Item::create(
                    [
                    'quantity'  => '1',
                    'subtotal' => $product->getPrice(),
                    'product'  => $product->getId(),
                    'order'  => $order->getId()
                    ]
                );
            }

            $request->session()->forget('products');
            $response['status'] = 'success';
            $response['order'] = $order;
        
        }catch (Exception $e){
            $response['status'] = 'error';
            $response['order'] = null;
        }   
        
        return $response;
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

        return view('order.show')->with("data", $order);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $order = Order::findOrFail($id);
        $order->items()->delete();
        $order->delete();
        return redirect()->route('order.list', 'created_at')->with('success', 'Order deleted successfully!!');
    }

    public function listBy($param = 'created_at')
    {
        $data = []; 
        $data["title"] = "List Orders";
        if(Auth::user()->getType() == "admin") {
            $data["orders"] = Order::orderBy($param, 'desc')->get();
        }
        else {
            $data["orders"] = Auth::user()->getOrders();
        }

        return view('order.list')->with("data", $data);
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
        return view('order.list')->with("data", $data);
    }

    public function download()
    {
        if(Auth::user()->getType() == 'admin') {
            $data = Order::all();
        }
        else {
            $data = Order::where('user', '=', Auth::user()->getID())->get();
        }
        $pdf = PDF::loadView('order.download', compact('data'));  

        return $pdf->download('Orders.pdf');
    }

    public function pay(Request $request)
    {
        $orderCreation = $this->save($request);

        if ($orderCreation['status'] === 'success') {
            $status = $this->paymentMethod
                ->pay(
                    $orderCreation['order']->getPrice(),
                    $request->input('currency'),
                    route('order.payment'),
                    route('home')
                );
        }

        if ($status['state'] === 'success') {
            $orderCreation['order']->setStatus('Paid');
            $orderCreation['order']->save();
            return redirect()->away($status['approvalLink']);
        }
        else {
            return redirect()->route('home');
        }
    }

    public function getPaymentStatus(Request $request)
    {
        $data = null;
        $status = $this->paymentMethod->getStatus($request);

        if ($status['state'] === 'success') {
            $data = $status;
        }
        else {
            $data = $status;
        }

        return view('order.payment')->with('data', $data);
    }
}