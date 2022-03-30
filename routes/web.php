<?php

use Illuminate\Support\Facades\Route;
//Auth Controller
use App\Http\Controllers\Auth\VerificationEmailController;
use App\Http\Controllers\HomeRouteController;
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
//Mail
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPersonnelEmail;

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
Route::get('/home', [HomeRouteController::class, 'index'])->name('home');
Auth::routes(['verify' => true]);
//Auth::routes();
//Route::get('/email/verify/{id}/{hash}', [VerificationEmailController::class, '__invoke'])
//    ->middleware(['signed', 'throttle:6,1'])
//    ->name('verification.verify');
// custom listener verified email
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
    Route::get('/admin-kpilibrary', [dataLibraryController::class, 'kpilibrary'])->name('admin.datalibrary.kpilibrary');
    Route::get('/admin-silibrary', [dataLibraryController::class, 'silibrary'])->name('admin.datalibrary.silibrary');
    // -> logic
    Route::post('/admin-addbusinesscategories', [businessCategoriesController::class, 'addBusinessCategories'])->name('admin.datalibrary.addbusinesscategories');
    Route::post('/admin-addbisnis', [businessCategoriesController::class, 'addBisnis'])->name('admin.datalibrary.addbisnis');
    Route::post('/admin-deletebisnis', [businessCategoriesController::class, 'deleteBisnis'])->name('admin.datalibrary.deletebisnis');
    Route::post('/admin-addso', [dataLibraryController::class, 'addSo'])->name('admin.datalibrary.addso');
    Route::post('/admin-addkpi', [dataLibraryController::class, 'addKpi'])->name('admin.datalibrary.addkpi');
    Route::post('/admin-addsi', [dataLibraryController::class, 'addSi'])->name('admin.datalibrary.addsi');
    Route::post('/admin-deletesi', [dataLibraryController::class, 'deleteSi'])->name('admin.datalibrary.deletesi');
});


// == CLIENT ROUTE ==
Route::middleware([ClientGuard::class, 'verified'])->group(function () {
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
    Route::get('/client-target-addtargetstatus', [targetController::class, 'addtargetstatus'])->name('client.target.addtargetstatus');
    Route::get('/client-target-updatetargetstatus', [targetController::class, 'updatetargetstatus'])->name('client.target.updatetargetstatus');
    Route::post('/client-target-activate', [targetController::class, 'activateTarget'])->name('client.target.activate');

    // ** Performance Report **
    Route::get('/client-performancereport', [performanceReportController::class, 'index'])->name('client.performancereport');
    Route::get('/client-performancereport-details', [performanceReportController::class, 'details'])->name('client.performancereport.details');
    Route::post('/client-performancereport-approvecapaian', [performanceReportController::class, 'approveCapaian'])->name('client.performancereport.approvecapaian');
    Route::post('/client-performancereport-rejectcapaian', [performanceReportController::class, 'rejectCapaian'])->name('client.performancereport.rejectcapaian');

    // ** Initiatives **
    // -> page
    Route::get('/client-initiative-personnel', [initiativeController::class, 'index'])->name('client.initiative.personnel');
    Route::get('/client-initiative-kpi', [initiativeController::class, 'kpi'])->name('client.initiative.kpi');
    //Route::get('/client-initiative-initiative', [initiativeController::class, 'initiative'])->name('client.initiative.initiative');
    Route::get('/client-initiative-actionplan', [initiativeController::class, 'actionplan'])->name('client.initiative.actionplan');
    // -> logic
    Route::post('/client-initiative-addinitiative', [initiativeController::class, 'addInitiative'])->name('client.initiative.addinitiative');
    Route::post('/client-initiative-deleteinitiative', [initiativeController::class, 'deleteInitiative'])->name('client.initiative.deleteinitiative');
    Route::post('/client-initiative-approveinitiative', [initiativeController::class, 'approveInitiative'])->name('client.initiative.approveinitiative');
    Route::post('/client-initiative-addactionplan', [initiativeController::class, 'addActionPlan'])->name('client.initiative.addactionplan');
    Route::post('/client-initiative-deleteactionplan', [initiativeController::class, 'deleteActionPlan'])->name('client.initiative.deleteactionplan');
    Route::post('/client-initiative-approveactionplan', [initiativeController::class, 'approveActionplan'])->name('client.initiative.approveactionplan');
});

// == PERSONNEL ROUTE ==
Route::middleware([PersonnelGuard::class, 'verified'])->group(function () {
    Route::get('/personnel-home', [personnelHomeController::class, 'index'])->name('personnel.home')->middleware('PersonnelGuard');

    // * target *
    Route::get('/personnel-target', [personnelTargetController::class, 'index'])->name('personnel.target');
    Route::get('/personnel-target-approve', [personnelTargetController::class, 'approve'])->name('personnel.target.approve');
    Route::post('/personnel-target-notapprove', [personnelTargetController::class, 'notapprove'])->name('personnel.target.notapprove');

    // * Capaian *
    // -> page
    Route::get('/personnel-capaian', [personnelCapaianController::class, 'index'])->name('personnel.capaian');
    Route::post('/personnel-capaian', [personnelCapaianController::class, 'index'])->name('personnel.capaian');
    // -> logic
    Route::post('/personnel-capaian-addcapaian', [personnelCapaianController::class, 'addCapaian'])->name('personnel.capaian.addcapaian');
    Route::post('/personnel-capaian-updatecapaian', [personnelCapaianController::class, 'updateCapaian'])->name('personnel.capaian.updatecapaian');
    Route::get('/personnel-capaian-sendNotification', [personnelCapaianController::class, 'sendNotification'])->name('personnel.capaian.sendNotification');
    
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
