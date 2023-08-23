<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarHistory;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Order;
use Illuminate\Http\Request;

class CarHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Car History', true, route('admin.car-history.index')],
            ['Index', false],
        ];
        $title = 'All Car History';
        $histories = CarHistory::with('order', 'order.car', 'order.employee', 'order.driver')->orderBy('history_kembali', 'ASC')->get();
        return view('admin.car-history.index', compact('breadcrumbs', 'title', 'histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Car History', true, route('admin.car-history.index')],
            ['Create', false],
        ];
        $title = 'Create Car History';

        // Order Terima Here
        $orders = Order::where('order_status', 'terima')->get();

        return view('admin.car-history.create', compact('breadcrumbs', 'title', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required',
            'history_pinjam' => 'required',
            'history_note' => 'required',
        ]);

        CarHistory::create($validated);

        $order = Order::find($request->order_id);
        $order->update(['order_status'=> 'selesai']);
        Car::where('id', $order->car_id)->update(['car_avail' => 'tidak ada']);

        return redirect()->route('admin.car-history.create')->with(['message' => 'Sukses Menambahkan History Mobil.', 'color'=> 'bg-success-500']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(CarHistory $car_history)
    {
        $title = $car_history->order->car->car_name;
        $breadcrumbs = [
            ['Car History', true, route('admin.car-history.index')],
            [$title, false],
        ];
        return view('admin.car-history.show', compact('breadcrumbs', 'title', 'car_history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarHistory $car_history)
    {
        $breadcrumbs = [
            ['Car History', true, route('admin.car-history.index')],
            [$car_history->order->car->car_name, true, route('admin.car-history.show', $car_history->id)],
            ['Edit', false],
        ];
        $title = $car_history->order->car->car_name;


        return view('admin.car-history.edit', compact('breadcrumbs', 'title', 'car_history'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarHistory $car_history)
    {
        $validated = $request->validate([
            'history_kembali' => 'required',
        ]);

        Car::where('id', $car_history->order->car_id)->update(['car_avail' => 'ada']);
        Driver::where('id', $car_history->order->driver_id)->update(['driver_avail' => 1]);
        $car_history->update($validated);

        return redirect()->route('admin.car-history.index')->with(['message' => 'Sukses Mengubah Data History Mobil.', 'color'=> 'bg-success-500']);;
    }
}
