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
                        <label for="order_id" class="form-label">Order<span class="text-red-500">*</span></label>
                        <select name="order_id" id="order_id" class="form-control w-full mt-2">
                            @foreach ($orders as $order)
                                <option value="{{ $order->id }}" {{ old('order_id') == $order->id ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $order->car->car_name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('order_id')" class="mt-2" />
                    </div>

                    <div>
                        <label for="history_pinjam" class=" form-label">Tanggal Pinjam<span class="text-red-500">*</span></label>
                        <input class="form-control py-2" id="history_pinjam" name="history_pinjam" value="{{ old('history_pinjam') }}" type="date">
                        <x-input-error :messages="$errors->get('history_pinjam')" class="mt-2" />
                    </div>

                    <div class="input-area relative">
                        <label for="history_note" class="form-label">Note<span class="text-red-500">*</span></label>
                        <input type="text" id="history_note" name="history_note" class="form-control" placeholder="Enter Your Note" value="{{ old('history_note') }}">
                        <x-input-error :messages="$errors->get('history_note')" class="mt-2" />
                    </div>

                    <button class="btn inline-flex justify-center btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
