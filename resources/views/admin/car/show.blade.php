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
                        <label for="car_name" class="form-label">Nama Mobil</label>
                        <input type="text" id="car_name" name="car_name" class="form-control" placeholder="Enter Your Car Name" value="{{ $car->car_name }}" readonly>
                        <x-input-error :messages="$errors->get('car_name')" class="mt-2" />
                    </div>
                    <div>
                        <label for="car_type" class="form-label">Tipe Mobil</label>
                        <select name="car_type" id="car_type" class="form-control w-full mt-2" disabled>
                            <option selected value="orang" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Orang</option>
                            <option value="barang" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Barang</option>
                        </select>
                        <x-input-error :messages="$errors->get('car_type')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="car_owner" class="form-label">Pemilik Mobil</label>
                        <input type="text" id="car_owner" name="car_owner" class="form-control" placeholder="Enter Your Car Owner" value="{{ $car->car_owner }}" readonly>
                        <x-input-error :messages="$errors->get('car_owner')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="car_bbm" class="form-label">BBM (Liter)</label>
                        <input type="text" id="car_bbm" name="car_bbm" class="form-control" placeholder="Enter Your BBM" value="{{ $car->car_bbm }}" readonly>
                        <x-input-error :messages="$errors->get('car_bbm')" class="mt-2" />
                    </div>
                    <div>
                        <label for="car_service" class=" form-label">Servis Berikutnya</label>
                        <input class="form-control py-2" id="car_service" name="car_service" value="{{ $car->car_service }}" type="date" readonly>
                        <x-input-error :messages="$errors->get('car_service')" class="mt-2" />
                    </div>
                    <div>
                        <label for="car_avail" class="form-label">Ketersediaan Mobil</label>
                        <select name="car_avail" id="car_avail" class="form-control w-full mt-2" disabled>
                            <option value="ada" {{ $car->car_avail == 'ada' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Ada</option>
                            <option value="proses dipinjam" {{ $car->car_avail == 'proses dipinjam' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Proses Dipinjam</option>
                            <option value="tidak ada" {{ $car->car_avail == 'tidak ada' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Tidak Ada</option>
                        </select>
                        <x-input-error :messages="$errors->get('car_avail')" class="mt-2" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
