<?php

namespace App\Http\Controllers;

use App\Models\OrderLevel;
use Illuminate\Http\Request;

class OrderLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Order', true, route('admin.order.index')],
            ['Index', false],
        ];
        $title = 'All Order Level';
        $order_levels = OrderLevel::latest()->get();
        return view('admin.order-level.index', compact('breadcrumbs', 'title', 'order_levels'));
    }
}
