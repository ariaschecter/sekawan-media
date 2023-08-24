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
                        <label for="order_id" class="form-label">Order</label>
                        <input type="text" id="order_id" name="order_id" class="form-control"
                            placeholder="Enter Your Note" value="{{ $car_history->order->car->car_name }}" readonly>
                        <x-input-error :messages="$errors->get('order_id')" class="mt-2" />
                    </div>

                    <div>
                        <label for="history_pinjam" class=" form-label">Tanggal Pinjam</label>
                        <input class="form-control py-2" id="history_pinjam" name="history_pinjam"
                            value="{{ $car_history->history_pinjam }}" type="date" readonly>
                        <x-input-error :messages="$errors->get('history_pinjam')" class="mt-2" />
                    </div>

                    <div>
                        <label for="history_kembali" class=" form-label">Tanggal Dikembalikan</label>
                        <input class="form-control py-2" id="history_kembali" name="history_kembali"
                            value="{{ $car_history->history_kembali }}" type="date" readonly>
                        <x-input-error :messages="$errors->get('history_kembali')" class="mt-2" />
                    </div>

                    <div class="input-area relative">
                        <label for="history_note" class="form-label">Note</label>
                        <input type="text" id="history_note" name="history_note" class="form-control"
                            placeholder="Enter Your Note" value="{{ $car_history->history_note }}" readonly>
                        <x-input-error :messages="$errors->get('history_note')" class="mt-2" />
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
