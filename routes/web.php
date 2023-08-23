<?php

use App\Http\Controllers\Acc\AccOrderLevelController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarHistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderLevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('auth', 'verified')->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::middleware('role:admin', 'auth')->prefix('admin')->name('admin.')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'admin')->name('dashboard');
        Route::get('/log', 'log')->name('log.index');
    });

    Route::get('user/archive', [UserController::class, 'archive'])->name('user.archive');
    Route::post('user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
    Route::resource('user', UserController::class)->except('edit')->withTrashed(['*']);

    Route::resource('driver', DriverController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('car', CarController::class);
    Route::resource('car-history', CarHistoryController::class)->except('destory');
    Route::get('/order/excel', [OrderController::class, 'excel'])->name('order.excel');
    Route::post('/order/excel', [OrderController::class, 'excel_post']);
    Route::resource('order', OrderController::class)->except(['edit', 'update']);
    Route::resource('order-level', OrderLevelController::class)->except(['create', 'delete']);
});

Route::middleware('role:acc', 'auth')->prefix('acc')->name('acc.')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'acc')->name('dashboard');
    });

    Route::resource('order-level', AccOrderLevelController::class)->except(['create', 'destroy']);
});

require __DIR__.'/auth.php';
