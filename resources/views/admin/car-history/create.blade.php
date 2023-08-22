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
                <form class="space-y-4" method="POST" action="{{ route('admin.car-history.store') }}">
                    @csrf
                    <div>
                        <label for="employee_id" class="form-label">Employee<span class="text-red-500">*</span></label>
                        <select name="employee_id" id="employee_id" class="form-control w-full mt-2">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $employee->employee_name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                    </div>
                    <div>
                        <label for="car_id" class="form-label">Car<span class="text-red-500">*</span></label>
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
                        <label for="history_pinjam" class=" form-label">History Pinjam<span class="text-red-500">*</span></label>
                        <input class="form-control py-2" id="history_pinjam" name="history_pinjam" value="{{ old('history_pinjam') }}" type="date">
                        <x-input-error :messages="$errors->get('history_pinjam')" class="mt-2" />
                    </div>
                    <div>
                        <label for="history_kembali" class=" form-label">History Kembali</label>
                        <input class="form-control py-2" id="history_kembali" name="history_kembali" value="{{ old('history_kembali') }}" type="date">
                        <x-input-error :messages="$errors->get('history_kembali')" class="mt-2" />
                    </div>

                    <div class="input-area relative">
                        <label for="history_note" class="form-label">Note<span class="text-red-500">*</span></label>
                        <input type="text" id="history_note" name="history_note" class="form-control" placeholder="Enter Your Note" value="{{ old('history_note') }}">
                        <x-input-error :messages="$errors->get('history_note')" class="mt-2" />
                    </div>
                    <div>
                        <label for="history_status" class="form-label">Status<span class="text-red-500">*</span></label>
                        <select name="history_status" id="history_status" class="form-control w-full mt-2">
                            <option selected value="0" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Dipinjam</option>
                            <option value="1" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Dikembalikan</option>
                        </select>
                        <x-input-error :messages="$errors->get('history_status')" class="mt-2" />
                    </div>
                    <button class="btn inline-flex justify-center btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
