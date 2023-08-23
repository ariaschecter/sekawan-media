<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Driver', true, route('admin.driver.index')],
            ['Index', false],
        ];
        $title = 'All Driver';
        $drivers = Driver::orderBy('driver_name', 'ASC')->get();
        return view('admin.driver.index', compact('breadcrumbs', 'title', 'drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Driver', true, route('admin.driver.index')],
            ['Create', false],
        ];
        $title = 'Create Driver';
        return view('admin.driver.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'driver_name' => 'required',
            'driver_phone' => 'required',
        ]);

        Driver::create($validated);

        return redirect()->route('admin.driver.create')->with(['message' => 'Sukses Menambahkan Driver.', 'color'=> 'bg-success-500']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        $title = $driver->driver_name;
        $breadcrumbs = [
            ['Driver', true, route('admin.driver.index')],
            [$title, false],
        ];
        return view('admin.driver.show', compact('breadcrumbs', 'title', 'driver'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        $breadcrumbs = [
            ['Driver', true, route('admin.driver.index')],
            [$driver->driver_name, true, route('admin.driver.show', $driver->id)],
            ['Edit', false],
        ];
        $title = $driver->driver_name;
        return view('admin.driver.edit', compact('breadcrumbs', 'title', 'driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $validated = $request->validate([
            'driver_name' => 'required',
            'driver_phone' => 'required',
            'driver_avail' => 'required',
        ]);

        $driver->update($validated);

        return redirect()->route('admin.driver.index')->with(['message' => 'Sukses Mengubah Data Driver.', 'color'=> 'bg-success-500']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->back()->with(['message' => 'Sukses Menghapus data Driver.', 'color'=> 'bg-success-500']);
    }
}
