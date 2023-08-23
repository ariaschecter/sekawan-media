@extends('admin.admin_template')

@section('main')
    <div class="flex justify-between flex-wrap items-center mb-6">
        <h4
            class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">
            Chart Peminjaman Mobil</h4>
    </div>


    <div class="card my-5">
        <div class="card-body flex flex-col p-6">
            <div class="card-text h-full ">
                @if (count($months) > 0)
                {!! $chart1->container() !!}
                @else
                <h5>Data Kosong</h5>
                @endif
            </div>
        </div>
    </div>


    <div class="card my-5">
        <div class="card-body flex flex-col p-6">
            <div class="card-text h-full ">
                @if (count($all_times) > 0)
                {!! $chart2->container() !!}
                @else
                <h5>Data Kosong</h5>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('js')
{{-- {!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!} --}}
{!! count($months) > 0 ? $chart1->script() : '' !!}
{!! count($all_times) > 0 ? $chart2->script() : '' !!}
@endsection
