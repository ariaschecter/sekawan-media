<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Employee', true, route('admin.employee.index')],
            ['Index', false],
        ];
        $title = 'All Employee';
        $employees = Employee::orderBy('employee_name', 'ASC')->get();
        return view('admin.employee.index', compact('breadcrumbs', 'title', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Employee', true, route('admin.employee.index')],
            ['Create', false],
        ];
        $title = 'Create Employee';
        return view('admin.employee.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_name' => 'required',
            'employee_phone' => 'required',
        ]);

        Employee::create($validated);

        return redirect()->route('admin.employee.create')->with(['message' => 'Sukses Menambahkan Employee.', 'color'=> 'bg-success-500']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $title = $employee->employee_name;
        $breadcrumbs = [
            ['Employee', true, route('admin.employee.index')],
            [$title, false],
        ];
        return view('admin.employee.show', compact('breadcrumbs', 'title', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $breadcrumbs = [
            ['Employee', true, route('admin.employee.index')],
            [$employee->employee_name, true, route('admin.employee.show', $employee->id)],
            ['Edit', false],
        ];
        $title = $employee->employee_name;
        return view('admin.employee.edit', compact('breadcrumbs', 'title', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'employee_name' => 'required',
            'employee_phone' => 'required',
        ]);

        $employee->update($validated);

        return redirect()->route('admin.employee.index')->with(['message' => 'Sukses Mengubah Data Employee.', 'color'=> 'bg-success-500']);;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back()->with(['message' => 'Sukses Menghapus Data Employee.', 'color'=> 'bg-success-500']);;
    }
}
