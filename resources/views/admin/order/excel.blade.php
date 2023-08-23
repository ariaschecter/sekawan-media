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
                <form class="space-y-4" method="POST" action="{{ route('admin.order.excel') }}">
                    @csrf
                    <div>
                        <label for="date_from" class=" form-label">Tanggal Awal<span class="text-red-500">*</span></label>
                        <input class="form-control py-2" id="date_from" name="date_from" value="{{ old('date_from') }}" type="date">
                        <x-input-error :messages="$errors->get('date_from')" class="mt-2" />
                    </div>

                    <div>
                        <label for="date_end" class=" form-label">Tanggal Akhir<span class="text-red-500">*</span></label>
                        <input class="form-control py-2" id="date_end" name="date_end" value="{{ old('date_end') }}" type="date">
                        <x-input-error :messages="$errors->get('date_end')" class="mt-2" />
                    </div>

                    <button class="btn inline-flex justify-center btn-dark">Export</button>
                </form>
            </div>
        </div>
    </div>
@endsection
