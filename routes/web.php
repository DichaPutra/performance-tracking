<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminHomeController;
use App\Http\Controllers\client\clientHomeController;
use App\Http\Controllers\personnel\personnelHomeController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Middleware\ClientGuard;
use App\Http\Middleware\AdminGuard;
use App\Http\Middleware\PersonnelGuard;

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

    // * Target * 
    Route::get('/client-target', function () {
        return view('client.target.target');
    })->name('client.target');

    Route::get('/client-target-details', function () {
        return view('client.target.details');
    })->name('client.target.details');

    // Target 2 (x)
    Route::get('/client-target-strategicobjective', function () {
        return view('client.target2.strategicobjective');
    })->name('client.target.strategicobjective');

    Route::get('/client-target-kpi', function () {
        return view('client.target2.kpi');
    })->name('client.target.kpi');

    Route::get('/client-target-actionplan', function () {
        return view('client.target2.actionplan');
    })->name('client.target.actionplan');

    Route::get('/client-target-actionplandetail', function () {
        return view('client.target2.actionplandetail');
    })->name('client.personnel.actionplandetail');

    // ** KPI ** (X)
    Route::get('/client-kpi', function () {
        return view('client.kpi.kpi');
    })->name('client.kpi');

    Route::get('/client-kpi-details', function () {
        return view('client.kpi.details');
    })->name('client.kpi.details');

    // * Report * (X)
    Route::get('/client-report-viewreport', function () {
        return view('client.report.viewreport');
    })->name('client.report.viewreport');

    // * Performance Report *
    Route::get('/client-performancereport', function () {
        return view('client.performancereport.performancereport');
    })->name('client.performancereport');
    Route::get('/client-performancereport-details', function () {
        return view('client.performancereport.details');
    })->name('client.performancereport.details');
    Route::get('/client-performancereport-kpi', function () {
        return view('client.performancereport.kpi');
    })->name('client.performancereport.kpi');

    // * Initiatives *
    Route::get('/client-initiative-personnel', function () {
        return view('client.initiative.personnel');
    })->name('client.initiative.personnel');
    Route::get('/client-initiative-kpi', function () {
        return view('client.initiative.kpi');
    })->name('client.initiative.kpi');
    Route::get('/client-initiative-initiative', function () {
        return view('client.initiative.initiative');
    })->name('client.initiative.initiative');
    Route::get('/client-initiative-actionplan', function () {
        return view('client.initiative.actionplan');
    })->name('client.initiative.actionplan');
});

// == Admin Route ==
Route::get('/admin-home', [adminHomeController::class, 'index'])->name('admin.home')->middleware('AdminGuard');

// == Personil Route ==
Route::get('/personnel-home', [personnelHomeController::class, 'index'])->name('personnel.home')->middleware('PersonnelGuard');

