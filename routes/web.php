<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminHomeController;
use App\Http\Controllers\client\clientHomeController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Middleware\ClientGuard;
use App\Http\Middleware\AdminGuard;
use App\Http\Middleware\PersonilGuard;

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
// == General Function ==
Route::get('/change-password', [ChangePasswordController::class, 'index']);
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');

// == Client Route ==
Route::middleware([ClientGuard::class])->group(function () {
    // * Home *
    Route::get('/client-home', [clientHomeController::class, 'index'])->name('client.home');
    // * Personil *
    Route::get('/client-personil', function () {
        return view('client.personil');
    })->name('client.personil');

    Route::get('/client-personil-addpersonil', function () {
        return view('client.personil-addpersonil');
    })->name('client.personil.addpersonil');

    Route::get('/client-personil-detailpersonil', function () {
        return view('client.personil-detailpersonil', ['edit' => '0']);
    })->name('client.personil.detailpersonil');

    Route::get('/client-personil-editpersonil', function () {
        return view('client.personil-detailpersonil', ['edit' => '1']);
    })->name('client.personil.editpersonil');

    // * KPI *
    Route::get('/client-kpi', function () {
        return view('client.kpi');
    })->name('client.kpi');

    // * Laporan *
    Route::get('/client-laporan', function () {
        return view('client.laporan');
    })->name('client.laporan');
});

// == Admin Route ==
Route::get('/admin-home', [adminHomeController::class, 'index'])->name('admin.home')->middleware('AdminGuard');
