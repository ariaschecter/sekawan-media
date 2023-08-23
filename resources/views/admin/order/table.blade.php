<table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
    <thead class=" bg-slate-200 dark:bg-slate-700">
        <tr>
            <th scope="col" class=" table-th ">
                Id
            </th>
            <th scope="col" class=" table-th ">
                Car Name
            </th>
            <th scope="col" class=" table-th ">
                Employee Name
            </th>
            <th scope="col" class=" table-th ">
                Driver Name
            </th>
            <th scope="col" class=" table-th ">
                Status
            </th>

            <th scope="col" class=" table-th ">
                Action
            </th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
        @foreach ($orders as $key => $order)
            <tr>
                <td class="table-td">{{ $key + 1 }}</td>
                <td class="table-td">{{ $order->car->car_name }}</td>
                <td class="table-td">{{ $order->employee->employee_name }}</td>
                <td class="table-td">{{ $order->driver->driver_name }}</td>
                <td class="table-td">{{ $order->order_status }}</td>
                <td class="table-td ">
                    <div class="flex space-x-3 rtl:space-x-reverse">
                        <a href="{{ route('admin.order.show', $order->id) }}"
                            class="toolTip onTop justify-center action-btn" data-tippy-content="Show"
                            data-tippy-theme="primary">
                            <iconify-icon icon="heroicons:eye"></iconify-icon>
                        </a>
                        <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="toolTip onTop justify-center action-btn" type="submit"
                                data-tippy-content="Delete" data-tippy-theme="danger">
                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
