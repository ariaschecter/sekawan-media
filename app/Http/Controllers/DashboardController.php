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

        $months = Order::with('car')->where('order_status', 'selesai')->whereMonth('updated_at', Carbon::now()->month)->select('car_id', DB::raw('count(*) as total'))
                ->groupBy('car_id')
                ->orderBy('total', 'ASC')
                ->get();
        foreach($months as $key => $order) {
            $y[$key] = $order->total;
            $x[$key] = $order->car->car_name . ' - ' . $order->car->car_type;
        }

        $chart1 = new SimpleChart;
        $chart1->labels($x);
        $chart1->dataset('Total Pakai Bulan Ini', 'line', $y);

        $all_times = Order::with('car')->where('order_status', 'selesai')->select('car_id', DB::raw('count(*) as total'))
                ->groupBy('car_id')
                ->orderBy('total', 'ASC')
                ->get();
        foreach($all_times as $key => $order) {
            $y[$key] = $order->total;
            $x[$key] = $order->car->car_name . ' - ' . $order->car->car_type;
        }

        $chart2 = new SimpleChart;
        $chart2->labels($x);
        $chart2->dataset('Total Pakai Semua Waktu', 'line', $y);

        return view('admin.dashboard.index', compact('breadcrumbs', 'chart1', 'chart2'));
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
