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
                        <label for="employee_id" class="form-label">Employee</label>
                        <input type="text" id="employee_id" name="employee_id" class="form-control" placeholder="Enter Your Note" value="{{ $car_history->employee->employee_name }}" readonly>
                        <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="car_id" class="form-label">Car</label>
                        <input type="text" id="car_id" name="car_id" class="form-control" placeholder="Enter Your Note" value="{{ $car_history->car->car_name }}" readonly>
                        <x-input-error :messages="$errors->get('car_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="driver_id" class="form-label">Driver</label>
                        <input type="text" id="driver_id" name="driver_id" class="form-control" placeholder="Enter Your Note" value="{{ $car_history->driver->driver_name }}" readonly>
                        <x-input-error :messages="$errors->get('driver_id')" class="mt-2" />
                    </div>

                    <div>
                        <label for="history_pinjam" class=" form-label">History Pinjam</label>
                        <input class="form-control py-2" id="history_pinjam" name="history_pinjam" value="{{ $car_history->history_pinjam }}" type="date" readonly>
                        <x-input-error :messages="$errors->get('history_pinjam')" class="mt-2" />
                    </div>
                    <div>
                        <label for="history_kembali" class=" form-label">History Kembali</label>
                        <input class="form-control py-2" id="history_kembali" name="history_kembali" value="{{ $car_history->history_kembali }}" type="date" readonly>
                        <x-input-error :messages="$errors->get('history_kembali')" class="mt-2" />
                    </div>

                    <div class="input-area relative">
                        <label for="history_note" class="form-label">Note</label>
                        <input type="text" id="history_note" name="history_note" class="form-control" placeholder="Enter Your Note" value="{{ $car_history->history_note }}" readonly>
                        <x-input-error :messages="$errors->get('history_note')" class="mt-2" />
                    </div>
                    <div>
                        <label for="history_status" class="form-label">Status</label>
                        <select name="history_status" id="history_status" class="form-control w-full mt-2" disabled>
                            <option value="0" {{ $car_history->history_status == '0' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Dipinjam</option>
                            <option value="1" {{ $car_history->history_status == '1' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Dikembalikan</option>
                        </select>
                        <x-input-error :messages="$errors->get('history_status')" class="mt-2" />
                    </div>
                    <button class="btn inline-flex justify-center btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
