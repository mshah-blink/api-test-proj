<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CcEcomPaymentController;
use App\Http\Controllers\CcMotoPaymentController;
use App\Http\Controllers\ObPaymentController;
use App\Http\Controllers\DdPaymentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cc_ecom_payment', [CcEcomPaymentController::class, 'index']);
Route::get('/cc_moto_payment', [CcMotoPaymentController::class, 'index']);
Route::get('/ob_payment', [ObPaymentController::class, 'index']);
Route::get('/dd_payment', [DdPaymentController::class, 'index']);

Route::post('/process', [ProcessController::class, 'store']);

Route::get('/return', [ReturnController::class, 'store']);

Route::post('/notification', [NotificationController::class, 'store']);
