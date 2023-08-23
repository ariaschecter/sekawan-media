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
            @include('admin.partials.alert')
            <div class="card-text h-full ">
                <form class="space-y-4" method="POST" action="{{ route('admin.order.store') }}">
                    @csrf
                    <div>
                        <label for="employee_id" class="form-label">Pegawai<span class="text-red-500">*</span></label>
                        <select name="employee_id" id="employee_id" class="form-control w-full mt-2">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $employee->employee_name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                    </div>
                    <div>
                        <label for="car_id" class="form-label">Mobil<span class="text-red-500">*</span></label>
                        <select name="car_id" id="car_id" class="form-control w-full mt-2">
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $car->car_name }} - {{ $car->car_type }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('car_id')" class="mt-2" />
                    </div>
                    <div>
                        <label for="driver_id" class="form-label">Driver<span class="text-red-500">*</span></label>
                        <select name="driver_id" id="driver_id" class="form-control w-full mt-2">
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}" {{ old('driver_id') == $driver->id ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $driver->driver_name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('driver_id')" class="mt-2" />
                    </div>
                    <div>
                        <label for="user_id" class="form-label">Pihak yang menyetujui<span class="text-red-500">*</span></label>
                        <select name="user_id" id="user_id" class="form-control w-full mt-2">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                    </div>

                    <button class="btn inline-flex justify-center btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
