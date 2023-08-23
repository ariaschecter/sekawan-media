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
                <form class="space-y-4" method="POST" action="{{ route('admin.driver.update', $driver->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="input-area relative">
                        <label for="driver_name" class="form-label">Nama Driver<span class="text-red-500">*</span></label>
                        <input type="text" id="driver_name" name="driver_name" class="form-control" placeholder="Enter Your Driver Name" value="{{ $driver->driver_name }}">
                        <x-input-error :messages="$errors->get('driver_name')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="driver_phone" class="form-label">Telepon Driver<span class="text-red-500">*</span></label>
                        <input type="text" id="driver_phone" name="driver_phone" class="form-control" placeholder="628xxxxxx" value="{{ $driver->driver_phone }}">
                        <x-input-error :messages="$errors->get('driver_phone')" class="mt-2" />
                    </div>
                    <div>
                        <label for="driver_avail" class="form-label">Ketersediaan Driver<span class="text-red-500">*</span></label>
                        <select name="driver_avail" id="driver_avail" class="form-control w-full mt-2">
                            <option value="1" {{ $driver->driver_avail == '1' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Ada</option>
                            <option value="0" {{ $driver->driver_avail == '0' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Tidak Ada</option>
                        </select>
                        <x-input-error :messages="$errors->get('driver_avail')" class="mt-2" />
                    </div>

                    <button class="btn inline-flex justify-center btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
