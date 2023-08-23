@extends('acc.admin_template')

@section('main')
    <div id="content_layout">
        @include('acc.partials.breadcrumb')
        <div class=" space-y-5">
            <div class="leveld">
                <header class=" leveld-header noblevel">
                    <h4 class="leveld-title">{{ $title }}
                    </h4>
                </header>
                @include('acc.partials.alert')
                <div class="leveld-body px-6 pb-6">
                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table
                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                    <thead class=" bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class=" table-th ">
                                                Id
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Nama Mobil
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Pegawai
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Driver
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Status
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($order_levels as $key => $order_level)
                                            <tr>
                                                <td class="table-td">{{ $key + 1 }}</td>
                                                <td class="table-td">{{ $order_level->order->car->car_name }}</td>
                                                <td class="table-td">{{ $order_level->order->employee->employee_name }}</td>
                                                <td class="table-td">{{ $order_level->order->driver->driver_name }}</td>
                                                <td class="table-td">{{ $order_level->order_level_status ?? 'Null' }}</td>
                                                <td class="table-td ">
                                                    @if($order_level->created_at == $order_level->updated_at)
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <a href="{{ route('acc.order-level.edit', $order_level->id) }}" class="toolTip onTop justify-center action-btn" data-tippy-content="Review" data-tippy-theme="info">
                                                                <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <a href="{{ route('acc.order-level.show', $order_level->id) }}" class="toolTip onTop justify-center action-btn" data-tippy-content="Show" data-tippy-theme="primary">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
