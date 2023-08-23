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
                <form class="space-y-4" method="POST" action="{{ route('admin.driver.store') }}">
                    @csrf
                    <div class="input-area relative">
                        <label for="driver_name" class="form-label">Nama Driver<span class="text-red-500">*</span></label>
                        <input type="text" id="driver_name" name="driver_name" class="form-control" placeholder="Enter Your Driver Name" value="{{ old('driver_name') }}">
                        <x-input-error :messages="$errors->get('driver_name')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="driver_phone" class="form-label">Telepon Driver<span class="text-red-500">*</span></label>
                        <input type="text" id="driver_phone" name="driver_phone" class="form-control" placeholder="628xxxxxx" value="{{ old('driver_phone') }}">
                        <x-input-error :messages="$errors->get('driver_phone')" class="mt-2" />
                    </div>
                    <button class="btn inline-flex justify-center btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
