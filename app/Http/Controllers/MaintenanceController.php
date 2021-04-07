<?php
 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Models\Maintenance;
 use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $data = [];
        $data['title'] = "Create Maintenance";    //WARNING!!!     THIS MIGHT BE IMPLEMENTED USING LANG
        return view('maintenance.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        $status = '';
        $message = '';

        if (Maintenance::validateData($request)) {
            Maintenance::create($request->all());
            $status = 'success';
            $message = 'Maintenance created successfully!!';
        } else {
            $status = 'error';
            $message = 'Unable to create maintenance';
        }

        return back()->with($status, $message);
    }

    public function show($id)
    {
        try
        {
            $maintenance = Maintenance::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            return redirect('/maintenance/list');
        }

        return view('maintenance.show')->with("data", $maintenance);
    }

    public function list()
    {
        $data = [];
        $data["title"] = "Maintenances";
        
        if (Auth::user()->getType() == "admin") {
            $data["maintenances"] = Maintenance::orderBy('created_at', 'desc')->get();
        }
        else {
            $data["maintenances"] = Auth::user()->getMaintenances();
        }

        return view('maintenance.list')->with('data', $data);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Maintenance::where('id', $id)->delete();
        return redirect()->route('maintenance.list')->with('success', 'Plane deleted successfully!!');
    }
}