<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\PekerjaanController;
use App\Http\Controllers\api\v1\HubunganController;
use App\Http\Controllers\api\v1\UmurController;

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

Route::get('/v1/pekerjaan', [PekerjaanController::class, 'index']);
Route::get('/v1/hubungan', [HubunganController::class, 'index']);
Route::get('/v1/umur-rentang', [UmurController::class, 'index']);
