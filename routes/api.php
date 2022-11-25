<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenjualanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kendaraan', [KendaraanController::class, 'index']);

Route::get('kendaraan/{id}/stok', [KendaraanController::class, 'getStockById']);

Route::get('kendaraan/{id}/log-jual', [PenjualanController::class, 'logPenjualanKendaaran']);

Route::post('kendaraan/{id}/jual', [PenjualanController::class, 'store']);

Route::post('motor', [MotorController::class, 'store']);

Route::post('mobil', [MobilController::class, 'store']);

