<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
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

Route::get('/', function () {
    return view('/sessions/login');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/pekerjaan', function () {
    return view('pekerjaan');
});


Route::get('/hubungan', function () {
    return view('hubungan');
});


Route::get('/umur', function () {
    return view('umur');
});

Route::get('/sessions', [SessionController::class, 'index']);
Route::post('/sessions/login', [SessionController::class, 'login']);

