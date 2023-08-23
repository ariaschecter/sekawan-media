@extends('admin.admin_template')

@section('main')
@include('admin.partials.breadcrumb')
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                </div>
            </header>
            <div class="card-text h-full ">
                <form class="space-y-4">
                    <div class="input-area relative">
                        <label for="employee_name" class="form-label">Nama Employee</label>
                        <input type="text" id="employee_name" name="employee_name" class="form-control" placeholder="Enter Your Employee Name" value="{{ $employee->employee_name }}" readonly>
                        <x-input-error :messages="$errors->get('employee_name')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="employee_phone" class="form-label">Telepon Employee</label>
                        <input type="text" id="employee_phone" name="employee_phone" class="form-control" placeholder="628xxxxxx" value="{{ $employee->employee_phone }}" readonly>
                        <x-input-error :messages="$errors->get('employee_phone')" class="mt-2" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
