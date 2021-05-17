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
    // * Personnel *
    Route::get('/client-personnel', function () {
        return view('client.personnel.personnel');
    })->name('client.personnel');

    Route::get('/client-personnel-addpersonnel', function () {
        return view('client.personnel.addpersonnel');
    })->name('client.personnel.addpersonnel');

    Route::get('/client-personnel-detailpersonnel', function () {
        return view('client.personnel.detailpersonnel', ['edit' => '0']);
    })->name('client.personnel.detailpersonnel');

    Route::get('/client-personnel-editpersonnel', function () {
        return view('client.personnel.detailpersonnel', ['edit' => '1']);
    })->name('client.personnel.editpersonnel');

    // * O K R *
    Route::get('/client-okr-objective', function () {
        return view('client.okr.objective');
    })->name('client.okr.objective');
    Route::get('/client-okr-keyresult', function () {
        echo 'key result';
        return view('client.okr.keyresult');
    })->name('client.okr.keyresult');

    // * Targets *
    Route::get('/client-target', function () {
        return view('client.target.target'); //XXXX
    })->name('client.target');

    Route::get('/client-target-strategicobjective', function () {
        return view('client.target.strategicobjective');
    })->name('client.target.strategicobjective');

    Route::get('/client-target-kpi', function () {
        return view('client.target.kpi');
    })->name('client.target.kpi');

    Route::get('/client-target-actionplan', function () {
        return view('client.target.actionplan');
    })->name('client.target.actionplan');

    // ** KPI **
    Route::get('/client-kpi', function () {
        return view('client.kpi.kpi');
    })->name('client.kpi');

    Route::get('/client-kpi-details', function () {
        return view('client.kpi.details');
    })->name('client.kpi.details');

    // * Report *
    Route::get('/client-report', function () {
        return view('client.report');
    })->name('client.report');
});

// == Admin Route ==
Route::get('/admin-home', [adminHomeController::class, 'index'])->name('admin.home')->middleware('AdminGuard');
