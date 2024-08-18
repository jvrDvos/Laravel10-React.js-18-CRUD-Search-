<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/productDelete/{id}', [ProductController::class, 'destroy']);
Route::post('/productEdit', [ProductController::class, 'update']);
Route::get('/Product', [ProductController::class, 'index']);
Route::post('/Product', [ProductController::class, 'store']);

// Route::resource('product', ProductController::class);
// Route::resource('/Product', ProductController::class);
