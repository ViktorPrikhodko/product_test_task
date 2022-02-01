<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('main');

Route::name('product')->group(function() {
    Route::get('/product/create', [ProductController::class, 'showCreateProductForm'])->name('.create');
    Route::post('/product', [ProductController::class, 'storeProduct'])->name('.store');
    Route::get('product/{product}/show}', [ProductController::class, 'show'])->name('.show');
    Route::get('/product/{product}/edit', [ProductController::class, 'showEditProductForm'])->name('.edit');
    Route::patch('/product/{product}', [ProductController::class, 'updateProduct'])->name('.update');
    Route::get('/product/{product}/delete', [ProductController::class, 'showDeleteFormProduct'])->name('.delete');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('.destroy');
});

