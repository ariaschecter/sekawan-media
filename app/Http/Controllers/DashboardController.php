<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        return view('admin.dashboard.index', compact('breadcrumbs'));
    }

    public function acc() {
        $breadcrumbs = [
            ['Dashboard', false],
        ];

        return view('acc.dashboard.index', compact('breadcrumbs'));
    }
}
