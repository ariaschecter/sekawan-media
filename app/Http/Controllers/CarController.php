<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Car', true, route('admin.car.index')],
            ['Index', false],
        ];
        $title = 'All Car';
        $cars = Car::orderBy('car_service', 'ASC')->get();
        return view('admin.car.index', compact('breadcrumbs', 'title', 'cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Car', true, route('admin.car.index')],
            ['Create', false],
        ];
        $title = 'Create Car';
        return view('admin.car.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_name' => 'required|unique:cars,car_name',
            'car_type' => 'required',
            'car_owner' => 'required',
            'car_bbm' => 'required',
            'car_service' => 'required',
        ]);

        Car::create($validated);

        return redirect()->route('admin.car.create')->with(['message' => 'Sukses Menambahkan Mobil.', 'color'=> 'bg-success-500']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $title = $car->car_name;
        $breadcrumbs = [
            ['Car', true, route('admin.car.index')],
            [$title, false],
        ];
        return view('admin.car.show', compact('breadcrumbs', 'title', 'car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $breadcrumbs = [
            ['Car', true, route('admin.car.index')],
            [$car->car_name, true, route('admin.car.show', $car->id)],
            ['Edit', false],
        ];
        $title = $car->car_name;
        return view('admin.car.edit', compact('breadcrumbs', 'title', 'car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'car_name' => ['required', Rule::unique('cars')->ignore($car->id, 'id')],
            'car_type' => 'required',
            'car_owner' => 'required',
            'car_bbm' => 'required|numeric',
            'car_service' => 'required',
            'car_avail' => 'required',
        ]);

        $car->update($validated);

        return redirect()->route('admin.car.index')->with(['message' => 'Sukses Mengubah Data Mobil.', 'color'=> 'bg-success-500']);;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->back()->with(['message' => 'Sukses Menghapus Data Mobil.', 'color'=> 'bg-success-500']);;
    }
}
