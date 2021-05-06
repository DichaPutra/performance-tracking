<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminHomeController;
use App\Http\Controllers\client\clientHomeController;

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
    return view('welcome');
});

Auth::routes();

// == Client Route ==
Route::get('/client-home', [clientHomeController::class, 'index'])->middleware('ClientGuard')->name('client.home');
Route::get('/client-personil', function () {
    return view('client.personil');
})->middleware('ClientGuard')->name('client.personil');
Route::get('/client-kpi', function () {
    return view('client.kpi');
})->middleware('ClientGuard')->name('client.kpi');
Route::get('/client-laporan', function () {
    return view('client.laporan');
})->middleware('ClientGuard')->name('client.laporan');

// == Admin Route ==
Route::get('/admin-home', [adminHomeController::class, 'index'])->name('admin.home')->middleware('AdminGuard');
