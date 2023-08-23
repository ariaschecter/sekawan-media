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
                <form class="space-y-4">
                    <div class="input-area relative">
                        <label for="employee_id" class="form-label">Pegawai</label>
                        <input type="text" id="employee_id" name="employee_id" class="form-control" placeholder="Enter Your Driver Name" value="{{ $order->employee->employee_name }}">
                        <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="car_id" class="form-label">Mobil</label>
                        <input type="text" id="car_id" name="car_id" class="form-control" placeholder="Enter Your Driver Name" value="{{ $order->car->car_name }}">
                        <x-input-error :messages="$errors->get('car_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="driver_id" class="form-label">Driver</label>
                        <input type="text" id="driver_id" name="driver_id" class="form-control" placeholder="Enter Your Driver Name" value="{{ $order->driver->driver_name }}">
                        <x-input-error :messages="$errors->get('driver_id')" class="mt-2" />
                    </div>
                    <div>
                        <label for="user_id" class="form-label">Pihak yang menyetujui</label>
                        <select name="user_id" id="user_id" class="select2 form-control w-full mt-2 py-2" multiple="multiple" disabled>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" selected class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-area relative">
                        <label for="order_status" class="form-label">Order Status</label>
                        <input type="text" id="order_status" name="order_status" class="form-control" placeholder="Enter Your Driver Name" value="{{ $order->order_status }}" readonly>
                        <x-input-error :messages="$errors->get('order_status')" class="mt-2" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
