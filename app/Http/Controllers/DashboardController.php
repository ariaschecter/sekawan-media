<?php

namespace App\Http\Controllers;

use App\Models\CarHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Charts\SimpleChart;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index() {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else if ($role === 'acc') {
            return redirect()->route('acc.dashboard');
        }
    }

    public function admin() {
        $breadcrumbs = [
            ['Dashboard', false],
        ];
        $chart1 = new SimpleChart;
        $chart2 = new SimpleChart;

        $months = Order::with('car')->where('order_status', 'selesai')->whereMonth('updated_at', Carbon::now()->month)->select('car_id', DB::raw('count(*) as total'))
                ->groupBy('car_id')
                ->orderBy('total', 'ASC')
                ->get();
        foreach($months as $key => $order) {
            $monthY[$key] = $order->total;
            $monthX[$key] = $order->car->car_name . ' - ' . $order->car->car_type;
        }

        $all_times = Order::with('car')->where('order_status', 'selesai')->select('car_id', DB::raw('count(*) as total'))
                ->groupBy('car_id')
                ->orderBy('total', 'ASC')
                ->get();
        foreach($all_times as $key => $order) {
            $allY[$key] = $order->total;
            $allX[$key] = $order->car->car_name . ' - ' . $order->car->car_type;
        }

        if (count($months) > 0) {
            $chart1->labels($monthX);
            $chart1->dataset('Total Pakai Bulan Ini', 'line', $monthY);
        }

        if (count($all_times) > 0) {
            $chart2->labels($allX);
            $chart2->dataset('Total Pakai Semua Waktu', 'line', $allY);
        }


        return view('admin.dashboard.index', compact('breadcrumbs', 'chart1', 'chart2', 'months', 'all_times'));
    }

    public function acc() {
        $breadcrumbs = [
            ['Dashboard', false],
        ];

        return view('acc.dashboard.index', compact('breadcrumbs'));
    }

    public function log() {
        $breadcrumbs = [
            ['Log', true, route('admin.log.index')],
            ['Index', false],
        ];
        $title = 'All Log';
        $logs = Activity::latest()->get();
        return view('admin.log.index', compact('breadcrumbs', 'title', 'logs'));
    }
}
