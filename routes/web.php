<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\OrderController;

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/process', [OrderController::class, 'process'])->name('orders.process');
// Route::post('/orders/calculate', [OrderController::class, 'calculate'])->name('orders.calculate');
