<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderLevel;
use App\Models\User;
use Illuminate\Http\Request;

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
     * Show the form for editing the specified resource.
     */
    // public function edit(Order $order)
    // {
    //     $breadcrumbs = [
    //         ['Order', true, route('admin.order.index')],
    //         [$order->id, true, route('admin.order.show', $order->id)],
    //         ['Edit', false],
    //     ];
    //     $title = 'Edit Order';

    //     $find = explode(',', $order->user_id);

    //     $users = User::find($find);

    //     return view('admin.order.edit', compact('breadcrumbs', 'title', 'order', 'users'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Order $order)
    // {
    //     $validated = $request->validate([
    //         'order_status' => 'required',
    //     ]);

    //     $order->update($validated);

    //     return redirect()->route('admin.order.index')->with(['message' => 'Sukses Mengubah Data Order Mobil.', 'color'=> 'bg-success-500']);;
    // }

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
}
