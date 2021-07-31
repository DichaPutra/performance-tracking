<?php

use Illuminate\Support\Facades\Route;
// Controller
use App\Http\Controllers\admin\adminHomeController;
use App\Http\Controllers\admin\businessCategoriesController;
use App\Http\Controllers\admin\dataLibraryController;
use App\Http\Controllers\client\clientHomeController;
use App\Http\Controllers\client\personnelController;
use App\Http\Controllers\client\targetController;
use App\Http\Controllers\client\initiativeController;
use App\Http\Controllers\client\performanceReportController;
use App\Http\Controllers\personnel\personnelHomeController;
use App\Http\Controllers\personnel\personnelTargetController;
use App\Http\Controllers\personnel\personnelCapaianController;
use App\Http\Controllers\personnel\personnelPerformanceReportController;
use App\Http\Controllers\personnel\personnelInitiativeController;
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
Route::middleware([AdminGuard::class])->group(function () {
    // * Home *
    Route::get('/admin-home', [adminHomeController::class, 'index'])->name('admin.home');

    // * Data Library 
    // -> page
    Route::get('/admin-businesscategories', [businessCategoriesController::class, 'index'])->name('admin.datalibrary.businesscategories');
    Route::get('/admin-datalibrary', [dataLibraryController::class, 'index'])->name('admin.datalibrary.datalibrary');
    // -> logic
    Route::post('/admin-addbusinesscategories', [businessCategoriesController::class, 'addBusinessCategories'])->name('admin.datalibrary.addbusinesscategories');
    Route::post('/admin-addbisnis', [businessCategoriesController::class, 'addBisnis'])->name('admin.datalibrary.addbisnis');
    Route::post('/admin-deletebisnis', [businessCategoriesController::class, 'deleteBisnis'])->name('admin.datalibrary.deletebisnis');
});


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

    // ** Initiatives **
    // -> page
    Route::get('/client-initiative-personnel', [initiativeController::class, 'index'])->name('client.initiative.personnel');
    Route::get('/client-initiative-kpi', [initiativeController::class, 'kpi'])->name('client.initiative.kpi');
    //Route::get('/client-initiative-initiative', [initiativeController::class, 'initiative'])->name('client.initiative.initiative');
    Route::get('/client-initiative-actionplan', [initiativeController::class, 'actionplan'])->name('client.initiative.actionplan');
    // -> logic
    Route::post('/client-initiative-addinitiative', [initiativeController::class, 'addInitiative'])->name('client.initiative.addinitiative');
    Route::post('/client-initiative-deleteinitiative', [initiativeController::class, 'deleteInitiative'])->name('client.initiative.deleteinitiative');
    Route::post('/client-initiative-addactionplan', [initiativeController::class, 'addActionPlan'])->name('client.initiative.addactionplan');
    Route::post('/client-initiative-deleteactionplan', [initiativeController::class, 'deleteActionPlan'])->name('client.initiative.deleteactionplan');
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
    Route::get('/personnel-performancereport', [personnelPerformanceReportController::class, 'index'])->name('personnel.performancereport');

    // * Initiatives *
    Route::get('/personnel-initiative-kpi', [personnelInitiativeController::class, 'index'])->name('personnel.initiative.kpi');
    Route::get('/personnel-initiative-actionplan', [personnelInitiativeController::class, 'actionplan'])->name('personnel.initiative.actionplan');
    // -> logic
    Route::post('/personnel-initiative-addinitiative', [personnelInitiativeController::class, 'addInitiative'])->name('personnel.initiative.addinitiative');
    Route::post('/personnel-initiative-deleteinitiative', [personnelInitiativeController::class, 'deleteInitiative'])->name('personnel.initiative.deleteinitiative');
    Route::post('/personnel-initiative-addactionplan', [personnelInitiativeController::class, 'addActionPlan'])->name('personnel.initiative.addactionplan');
    Route::post('/personnel-initiative-deleteactionplan', [personnelInitiativeController::class, 'deleteActionPlan'])->name('personnel.initiative.deleteactionplan');
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
