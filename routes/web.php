<?php

use App\Http\Controllers\Category;
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
Route::get('/inventory/manage', [Inventory::class, 'manage'])->name('inventory.manage');
Route::get('/inventory/new', [Inventory::class, 'new'])->name('inventory.new');
Route::get('/inventory/manage/{id}', [Inventory::class, 'management'])->name('inventory.manage-id');
Route::get('/inventory/users/{id}', [Inventory::class, 'users'])->name('inventory.users-id');
Route::get('/inventory/history/{id}', [Inventory::class, 'history'])->name('inventory.history-id');
Route::post('/inventory/request/{id}', [Requests::class, 'make'])->name('inventory.request');
Route::post('/inventory/create', [Inventory::class, 'create'])->name('inventory.create');


Route::get('/requests', [Requests::class, 'view'])->name('requests');
Route::get('/requests/manage', [Requests::class, 'manage'])->name('requests.manage');
Route::post('/requests/{id}/approve', [Requests::class, 'approve'])->name('requests.approve');
Route::post('/requests/{id}/reject', [Requests::class, 'reject'])->name('requests.reject');
Route::post('/requests/{id}/late', [Requests::class, 'late'])->name('requests.late');
Route::post('/requests/{id}/activate', [Requests::class, 'active'])->name('requests.activate');
Route::post('/requests/{id}/cancel', [Requests::class, 'cancel'])->name('requests.cancel');
Route::post('/requests/{id}/returned', [Requests::class, 'returned'])->name('requests.returned');
Route::get('/requests/{id}/edit', [Requests::class, 'edit'])->name('requests.edit');


Route::get('/users', [Users::class, 'view'])->name('users.view');
Route::get('/users/{id}/details', [Users::class, 'details'])->name('users.details');

Route::get('/categories', [Category::class, 'all'])->name('category.all');
Route::get('/categories/new', [Category::class, 'new'])->name('category.new');
Route::post('/categories/create', [Category::class, 'create'])->name('category.create');
Route::get('/categories/{id}/view', [Category::class, 'view'])->name('category.view');
Route::get('/categories/{id}/edit', [Category::class, 'edit'])->name('category.edit');
Route::get('/categories/{id}/reassign/verify', [Category::class, 'reassignview'])->name('categories-id.reassign');
Route::post('/categories/{id}/reassign/confirmed', [Category::class, 'reassignaction'])->name('categories-id.reassign.confirmed');
Route::post('/categories/{id}/delete/all', [Category::class, 'deleteAllAssociated'])->name('categories.delete.all');
Route::post('/categories/{id}/delete', [Category::class, 'deleteCategory'])->name('category-delete');