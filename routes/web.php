<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ReturnController;
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

Route::get('/', [PaymentController::class, 'index']);

Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/process', [ProcessController::class, 'store']);

Route::get('/return', [ReturnController::class, 'store']);

Route::post('/notification', [NotificationController::class, 'store']);
