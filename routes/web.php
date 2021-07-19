<?php

use Illuminate\Support\Facades\Route;
// Controller
use App\Http\Controllers\admin\adminHomeController;
use App\Http\Controllers\client\clientHomeController;
use App\Http\Controllers\client\personnelController;
use App\Http\Controllers\client\targetController;
use App\Http\Controllers\client\initiativeController;
use App\Http\Controllers\client\performanceReportController;
use App\Http\Controllers\personnel\personnelHomeController;
use App\Http\Controllers\personnel\personnelTargetController;
use App\Http\Controllers\personnel\personnelCapaianController;
use App\Http\Controllers\ChangePasswordController;
// Middleware
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
// == GENERAL FUNCTION ==
Route::get('/change-password', [ChangePasswordController::class, 'index']);
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');

// == ADMIN ROUTE ==
Route::get('/admin-home', [adminHomeController::class, 'index'])->name('admin.home')->middleware('AdminGuard');

// == CLIENT ROUTE ==
Route::middleware([ClientGuard::class])->group(function () {
    // * Home *
    Route::get('/client-home', [clientHomeController::class, 'index'])->name('client.home');

    // ** Personnel **
    // -> page
    Route::get('/client-personnel', [personnelController::class, 'index'])->name('client.personnel');
    Route::get('/client-personnel-addpersonnel', [personnelController::class, 'addpersonnel'])->name('client.personnel.addpersonnel');
    Route::get('/client-personnel-detailpersonnel', [personnelController::class, 'detailpersonnel'])->name('client.personnel.detailpersonnel');
    Route::get('/client-personnel-editpersonnel', [personnelController::class, 'editpersonnel'])->name('client.personnel.editpersonnel');
    // -> logic
    Route::post('/client-personnel-addpersonnel', [personnelController::class, 'store'])->name('client.personnel.store');
    Route::post('/client-personnel-updatepersonnel', [personnelController::class, 'update'])->name('client.personnel.update');

    // ** Target ** 
    // -> page
    Route::get('/client-target', [targetController::class, 'index'])->name('client.target');
    Route::get('/client-target-details', [targetController::class, 'details'])->name('client.target.details');
    Route::get('/client-target-check', [targetController::class, 'check'])->name('client.target.check');
    Route::get('/client-target-activateconfirm', [targetController::class, 'activateConfirm'])->name('client.target.activateconfirm');
    // -> logic
    Route::post('/client-target-addso', [targetController::class, 'addSo'])->name('client.target.addso');
    Route::post('/client-target-editso', [targetController::class, 'editSo'])->name('client.target.editso');
    Route::post('/client-target-deleteso', [targetController::class, 'deleteSo'])->name('client.target.deleteso');
    Route::post('/client-target-addkpi', [targetController::class, 'addKpi'])->name('client.target.addkpi');
    Route::post('/client-target-editkpi', [targetController::class, 'editKpi'])->name('client.target.editkpi');
    Route::post('/client-target-deletekpi', [targetController::class, 'deleteKpi'])->name('client.target.deletekpi');
    Route::post('/client-target-activate', [targetController::class, 'activateTarget'])->name('client.target.activate');

    // ** Performance Report **
    Route::get('/client-performancereport', [performanceReportController::class, 'index'])->name('client.performancereport');
    Route::get('/client-performancereport-details', [performanceReportController::class, 'details'])->name('client.performancereport.details');
    Route::get('/client-performancereport-kpi', function () {
        return view('client.performancereport.kpi');
    })->name('client.performancereport.kpi');

    // ** Initiatives **
    // -> page
    Route::get('/client-initiative-personnel', [initiativeController::class, 'index'])->name('client.initiative.personnel');
    Route::get('/client-initiative-kpi', [initiativeController::class, 'kpi'])->name('client.initiative.kpi');
    Route::get('/client-initiative-initiative', [initiativeController::class, 'initiative'])->name('client.initiative.initiative');
    Route::get('/client-initiative-actionplan', function () {
        return view('client.initiative.actionplan');
    })->name('client.initiative.actionplan');
    // -> logic
    Route::post('/client-initiative-initiative', [initiativeController::class, 'addInitiative'])->name('client.initiative.addinitiative');
});

// == PERSONNEL ROUTE ==
Route::middleware([PersonnelGuard::class])->group(function () {
    Route::get('/personnel-home', [personnelHomeController::class, 'index'])->name('personnel.home')->middleware('PersonnelGuard');

    // * target *
    Route::get('/personnel-target', [personnelTargetController::class, 'index'])->name('personnel.target');


    // * Capaian *
    // -> page
    Route::get('/personnel-capaian', [personnelCapaianController::class, 'index'])->name('personnel.capaian');
    Route::post('/personnel-capaian', [personnelCapaianController::class, 'index'])->name('personnel.capaian');
    // -> logic
    Route::post('/personnel-capaian-addcapaian', [personnelCapaianController::class, 'addCapaian'])->name('personnel.capaian.addcapaian');

    // * Performance Report *
    Route::get('/personnel-performancereport', function () {
        return view('personnel.performancereport.performancereport');
    })->name('personnel.performancereport');
    Route::get('/personnel-performancereport-details', function () {
        return view('personnel.performancereport.details');
    })->name('personnel.performancereport.details');
    Route::get('/personnel-performancereport-kpi', function () {
        return view('personnel.performancereport.kpi');
    })->name('personnel.performancereport.kpi');

    // * Initiatives *
    Route::get('/personnel-initiative-personnel', function () {
        return view('personnel.initiative.personnel');
    })->name('personnel.initiative.personnel');
    Route::get('/personnel-initiative-kpi', function () {
        return view('personnel.initiative.kpi');
    })->name('personnel.initiative.kpi');
    Route::get('/personnel-initiative-initiative', function () {
        return view('personnel.initiative.initiative');
    })->name('personnel.initiative.initiative');
    Route::get('/personnel-initiative-actionplan', function () {
        return view('personnel.initiative.actionplan');
    })->name('personnel.initiative.actionplan');
});



//DUMP AREA
//    // Target 2 (x)
//    Route::get('/client-target-strategicobjective', function () {
//        return view('client.target2.strategicobjective');
//    })->name('client.target.strategicobjective');
//    Route::get('/client-target-kpi', function () {
//        return view('client.target2.kpi');
//    })->name('client.target.kpi');
//    Route::get('/client-target-actionplan', function () {
//        return view('client.target2.actionplan');
//    })->name('client.target.actionplan');
//    Route::get('/client-target-actionplandetail', function () {
//        return view('client.target2.actionplandetail');
//    })->name('client.personnel.actionplandetail');
//
//    // ** KPI ** (X)
//    Route::get('/client-kpi', function () {
//        return view('client.kpi.kpi');
//    })->name('client.kpi');
//    Route::get('/client-kpi-details', function () {
//        return view('client.kpi.details');
//    })->name('client.kpi.details');
//
//    // * Report * (X)
//    Route::get('/client-report-viewreport', function () {
//        return view('client.report.viewreport');
//    })->name('client.report.viewreport');
