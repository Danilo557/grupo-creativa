<?php

use App\Http\Controllers\Store\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Livewire\Store\BrandShow;
use App\Http\Livewire\Store\CreateOrder;
use App\Http\Livewire\Store\PaymentOrder;
use App\Http\Livewire\Store\ShoppingCart;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class,"index"])->name('store.index');
Route::get('/brands/{brand}', BrandShow::class)->name('store.brands');

Route::middleware(['auth'])->group(function () {
    Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');
    Route::get('orders/create',CreateOrder::class)->name('orders.create');
    Route::get('orders/{order}/payment/',PaymentOrder::class)->name('orders.payment');
    Route::get('orders/{order}/show/',[OrderController::class,"show"])->name('orders.show');
    Route::get('orders',[OrderController::class,"index"])->name('orders.index');

    
   
});
