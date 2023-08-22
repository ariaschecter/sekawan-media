<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarHistory;
use App\Models\Driver;
use App\Models\Employee;
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
        $title = 'All Car';
        $histories = CarHistory::latest()->get();
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

        $cars = Car::where('car_avail', 'ada')->orderBy('car_name', 'ASC')->get();
        $drivers = Driver::where('driver_avail', 1)->orderBy('driver_name', 'ASC')->get();
        $employees = Employee::orderBy('employee_name', 'ASC')->get();

        return view('admin.car-history.create', compact('breadcrumbs', 'title', 'cars', 'drivers', 'employees'));
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
            'history_pinjam' => 'required',
            'history_note' => 'required',
            'history_status' => 'required',
        ]);

        if ($request->history_status == '0') {
            Driver::where('id', $request->driver_id)->update(['driver_avail' => 0]);
            Car::where('id', $request->car_id)->update(['car_avail' => 'tidak ada']);
        } else {
            Driver::where('id', $request->driver_id)->update(['driver_avail' => 1]);
            Car::where('id', $request->car_id)->update(['car_avail' => 'ada']);
        }

        CarHistory::create($validated);

        return redirect()->route('admin.car-history.create')->with(['message' => 'Sukses Menambahkan History Mobil.', 'color'=> 'bg-success-500']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(CarHistory $car_history)
    {
        $title = $car_history->car->car_name;
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
            [$car_history->car->car_name, true, route('admin.car-history.show', $car_history->id)],
            ['Edit', false],
        ];
        $title = $car_history->car->car_name;

        $cars = Car::where('car_avail', 'ada')->orderBy('car_name', 'ASC')->get();
        $drivers = Driver::where('driver_avail', 1)->orderBy('driver_name', 'ASC')->get();
        $employees = Employee::orderBy('employee_name', 'ASC')->get();

        return view('admin.car-history.edit', compact('breadcrumbs', 'title', 'car_history', 'cars', 'drivers', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarHistory $car_history)
    {
        $validated = $request->validate([
            'history_kembali' => 'required',
            'history_status' => 'required',
        ]);

        $car_history->update($validated);

        return redirect()->route('admin.car-history.index')->with(['message' => 'Sukses Mengubah Data History Mobil.', 'color'=> 'bg-success-500']);;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarHistory $car_history)
    {
        Driver::where('id', $car_history->driver_id)->update(['driver_avail' => 1]);
        Car::where('id', $car_history->car_id)->update(['car_avail' => 'ada']);
        $car_history->delete();
        return redirect()->back()->with(['message' => 'Sukses Menghapus Data History Mobil.', 'color'=> 'bg-success-500']);;
    }
}
