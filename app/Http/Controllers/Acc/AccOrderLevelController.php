<?php

namespace App\Http\Controllers\Acc;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Driver;
use App\Models\OrderLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccOrderLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Persetujuan', true, route('acc.order-level.index')],
            ['Index', false],
        ];
        $title = 'Persetujuan';
        $order_levels = OrderLevel::where('user_id', Auth::id())->orderBy('order_level_status', 'ASC')->get();
        return view('acc.order-level.index', compact('breadcrumbs', 'title', 'order_levels'));
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderLevel $order_level)
    {
        $title = 'Persetujuan';
        $breadcrumbs = [
            ['Persetujuan', true, route('acc.order-level.index')],
            [$order_level->id, false],
        ];

        $find = explode(',', $order_level->user_id);

        $users = User::find($find);
        return view('acc.order-level.show', compact('breadcrumbs', 'title', 'order_level', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderLevel $order_level)
    {
        $breadcrumbs = [
            ['Persetujuan', true, route('acc.order-level.index')],
            [$order_level->id, false],
        ];
        $title = 'Edit Persetujuan';

        $find = explode(',', $order_level->order->user_id);

        $length = count($find);

        $users = User::whereNotIn('id', $find)->where('role', 'acc')->get();

        return view('acc.order-level.edit', compact('breadcrumbs', 'title', 'order_level', 'users', 'length'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderLevel $order_level)
    {
        $validated = $request->validate([
            'order_level_status' => 'required',
        ]);

        $order = $order_level->order;

        if ($request->order_level_status == 'tolak') {
            $order->update([
                'order_status' => 'tolak',
            ]);

            Car::where('id', $order->car_id)->update(['car_avail' => 'ada']);
            Driver::where('id', $order->driver_id)->update(['driver_avail' => 1]);
        } else {
            if ($request->length == 2) {
                $request->validate([
                    'user_id' => 'required|gte:0',
                ], [
                    'user_id.gte' => 'The Persetujuan Selanjutnya field is required.'
                ]);
            }

            if ($request->user_id != -1) {
                // Add user Id to order database
                $order->update([
                    'user_id' => $order->user_id . $request->user_id . ',',
                ]);

                // Add data to user_id
                OrderLevel::create([
                    'order_id' => $order->id,
                    'user_id' => $request->user_id,
                    'order_level_status' => null,
                ]);
            } else {
                // sudah di acc dan tidak memerlukan persetujuan tambahan
                $order->update([
                    'order_status' => 'terima',
                ]);
            }
        }

        $order_level->update($validated);

        return redirect()->route('acc.order-level.index')->with(['message' => 'Sukses Mengubah Data Persetujuan Mobil.', 'color'=> 'bg-success-500']);;
    }
}
