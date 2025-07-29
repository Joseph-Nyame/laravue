<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PropertyController;



Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');