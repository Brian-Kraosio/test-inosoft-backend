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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::group([
//
//    'middleware' => 'api',
//    'prefix' => 'auth'
//
//], function ($router) {
//
//    Route::post('login', [AuthController::class, 'login']);
//    Route::post('logout', [AuthController::class, 'logout']);
//    Route::post('refresh', [AuthController::class, 'refresh']);
//    Route::post('me', [AuthController::class, 'login']);
//
//});

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
});



Route::post('motor', [MotorController::class, 'store']);

Route::post('mobil', [MobilController::class, 'store']);

