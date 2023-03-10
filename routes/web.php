<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Cc3dsPaymentController;
use App\Http\Controllers\CcPaymentController;
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

Route::get('/cc_payment', [CcPaymentController::class, 'index']);
Route::get('/cc_3ds_payment', [Cc3dsPaymentController::class, 'index']);
Route::get('/ob_payment', [ObPaymentController::class, 'index']);
Route::get('/dd_payment', [DdPaymentController::class, 'index']);

Route::post('/process', [ProcessController::class, 'store']);

Route::get('/return', [ReturnController::class, 'store']);

Route::post('/notification', [NotificationController::class, 'store']);
