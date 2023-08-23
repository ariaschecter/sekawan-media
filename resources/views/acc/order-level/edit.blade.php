@extends('acc.admin_template')

@section('main')
@include('acc.partials.breadcrumb')
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                </div>
            </header>
            @include('acc.partials.alert')
            <div class="card-text h-full ">
                <form class="space-y-4"  method="POST" action="{{ route('acc.order-level.update', $order_level->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="length" value="{{ $length }}">
                    <div class="input-area relative">
                        <label for="employee_id" class="form-label">Pegawai</label>
                        <input type="text" id="employee_id" name="employee_id" class="form-control" placeholder="Enter Your Driver Name" value="{{ $order_level->order->employee->employee_name }}" readonly>
                        <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="car_id" class="form-label">Mobil</label>
                        <input type="text" id="car_id" name="car_id" class="form-control" placeholder="Enter Your Driver Name" value="{{ $order_level->order->car->car_name }} - {{ $order_level->order->car->car_type }}" readonly>
                        <x-input-error :messages="$errors->get('car_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="driver_id" class="form-label">Driver</label>
                        <input type="text" id="driver_id" name="driver_id" class="form-control" placeholder="Enter Your Driver Name" value="{{ $order_level->order->driver->driver_name }}" readonly>
                        <x-input-error :messages="$errors->get('driver_id')" class="mt-2" />
                    </div>
                    <div>
                        <label for="order_level_status" class="form-label">Order Status<span class="text-red-500">*</span></label>
                        <select name="order_level_status" id="order_level_status" class="form-control w-full mt-2">
                            <option value="terima" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Terima</option>
                            <option value="tolak" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Tolak</option>
                        </select>
                        <x-input-error :messages="$errors->get('order_level_status')" class="mt-2" />
                    </div>
                    <div >
                        <label for="user_id" class="form-label">Persetujuan Selanjutnya{!! $length == 2 ? '<span class="text-red-500">*</span>' : '' !!}</label>
                        <select name="user_id" id="user_id" class="form-control w-full mt-2">
                            <option value="-1" selected class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Silahkan pilih persetujuan selanjutnya</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $user->name }}</option>
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
