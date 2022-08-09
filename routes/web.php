<?php

use App\Http\Controllers\Inventory;
use App\Http\Controllers\Requests;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', function () {
    return redirect('login');
});

Route::get('/inventory', [Inventory::class, 'view'])->name('inventory');
Route::post('/inventory/request/{id}', [Requests::class, 'make'])->name('inventory.request');

Route::get('/requests', [Requests::class, 'view'])->name('requests');

Route::get('/users', [Users::class, 'view'])->name('users.view');