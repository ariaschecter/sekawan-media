<?php

namespace App\Http\Controllers;

use App\Exports\ArrayExport;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderLevel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Order', true, route('admin.order.index')],
            ['Index', false],
        ];
        $title = 'All Order';
        $orders = Order::latest()->get();
        return view('admin.order.index', compact('breadcrumbs', 'title', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Order', true, route('admin.order.index')],
            ['Create', false],
        ];
        $title = 'Create Order';

        $cars = Car::where('car_avail', 'ada')->orderBy('car_name', 'ASC')->get();
        $drivers = Driver::where('driver_avail', 1)->orderBy('driver_name', 'ASC')->get();
        $employees = Employee::orderBy('employee_name', 'ASC')->get();
        $users = User::where('role', 'acc')->orderBy('name', 'ASC')->get();

        return view('admin.order.create', compact('breadcrumbs', 'title', 'cars', 'drivers', 'employees', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'driver_id' => 'required',
            'car_id' => 'required',
            'employee_id' => 'required',
            'user_id' => 'required',
        ]);

            Driver::where('id', $request->driver_id)->update(['driver_avail' => 0]);
            Car::where('id', $request->car_id)->update(['car_avail' => 'proses dipinjam']);

        //     Driver::where('id', $request->driver_id)->update(['driver_avail' => 1]);
        //     Car::where('id', $request->car_id)->update(['car_avail' => 'ada']);

        $validated['user_id'] = $request->user_id . ',';
        $order = Order::create($validated);

        // Add data to user_id
        OrderLevel::create([
            'order_id' => $order->id,
            'user_id' => $request->user_id,
            'order_level_status' => null,
        ]);

        return redirect()->route('admin.order.create')->with(['message' => 'Sukses Menambahkan Order Mobil.', 'color'=> 'bg-success-500']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $title = 'Order';
        $breadcrumbs = [
            ['Order', true, route('admin.order.index')],
            [$order->id, false],
        ];

        $find = explode(',', $order->user_id);

        $users = User::find($find);
        return view('admin.order.show', compact('breadcrumbs', 'title', 'order', 'users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        Driver::where('id', $order->driver_id)->update(['driver_avail' => 1]);
        Car::where('id', $order->car_id)->update(['car_avail' => 'ada']);
        OrderLevel::where('order_id', $order->id)->delete();
        $order->delete();
        return redirect()->back()->with(['message' => 'Sukses Menghapus Data Order Mobil.', 'color'=> 'bg-success-500']);;
    }

    public function excel() {
        $breadcrumbs = [
            ['Order', true, route('admin.order.index')],
            ['Export', false],
        ];
        $title = 'Export Excel';

        return view('admin.order.excel', compact('breadcrumbs', 'title'));
    }

    public function excel_post(Request $request) {
        $request->validate([
            'date_from' => 'required|date',
            'date_end' => 'required|date',
        ]);
        $from = $request->date_from;
        $end = $request->date_end;

        $orders = Order::with('car', 'employee', 'driver')->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $end)->get();
        $change[0][0] = 'Car Name';
        $change[0][1] = 'Employee Name';
        $change[0][2] = 'Driver Name';
        $change[0][3] = 'Order Status';
        $change[0][4] = 'Date';
        foreach($orders as $key => $order) {
            $change[$key + 1][0] = $order->car->car_name;
            $change[$key + 1][1] = $order->employee->employee_name;
            $change[$key + 1][2] = $order->driver->driver_name;
            $change[$key + 1][3] = $order->order_status;
            $change[$key + 1][4] = Carbon::parse($order->created_at)->format('d M Y');
        }

        $export = new ArrayExport(array($change));
        $filename = 'Export ' . $from . ' to ' . $end . '.xlsx';
        return Excel::download($export, $filename);
    }
}
