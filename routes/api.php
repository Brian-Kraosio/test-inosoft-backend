<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\KendaraanController;
use App\Http\Controllers\Api\MobilController;
use App\Http\Controllers\Api\MotorController;
use App\Http\Controllers\Api\PenjualanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['jwt.verify']], function (){
    Route::post('user', [AuthController::class, 'me']);

    Route::controller(KendaraanController::class)->group(function (){
        Route::get('kendaraan', 'index');
        Route::get('kendaraan/{id}/stok', 'getStockById');

    });

    Route::controller(PenjualanController::class)->group(function (){
        Route::get('kendaraan/{id}/log-jual', 'logPenjualanKendaaran');
        Route::get('log-jual', 'index');
        Route::post('kendaraan/{id}/jual', 'store');
    });

    Route::controller(MobilController::class)->group(function (){
        Route::get('kendaraan/mobil', 'index');
        Route::post('kendaraan/mobil', 'store');
    });

    Route::controller(MotorController::class)->group(function (){
        Route::get('kendaraan/motor', 'index');
        Route::post('kendaraan/motor', 'store');
    });
});







