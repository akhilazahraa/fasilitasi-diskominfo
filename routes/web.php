<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IspController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TimController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// API Routes
Route::get('/api/events', [DashboardController::class, 'getEvents'])->name('events.get');

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Routes requiring admin role
Route::middleware(['auth', 'role:ADMIN'])->group(function () {
    Route::get('/dashboard/events/create', [EventController::class, 'create']);
    Route::post('/dashboard/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/dashboard/events', [EventController::class, 'index'])->name('dashboard.events.index');
    Route::delete('/dashboard/events/delete/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::delete('/dashboard/events/bulk-delete', [EventController::class, 'bulkDelete'])->name('dashboard.events.bulkDelete');
    Route::get('/dashboard/events/edit/{id}', [EventController::class, 'edit'])->name('dashboard.events.edit');
    Route::put('/dashboard/events/{id}', [EventController::class, 'update'])->name('dashboard.events.update');
    Route::get('/dashboard/events/details/{id}', [EventController::class, 'details'])->name('dashboard.events.details');
    Route::get('dashboard/events/details/pdf/{id}', [EventController::class, 'exportSingleEventPdf'])->name('dashboard.events.details.pdf');
    Route::get('dashboard/user', [DashboardController::class, 'showUser'])->name('dashboard.user');
    Route::get('dashboard/user/edit/{id}', [DashboardController::class, 'editUser'])->name('dashboard.user.edit');
    Route::put('dashboard/user/{id}', [DashboardController::class, 'updateUser'])->name('dashboard.user.update');
    Route::get('/dashboard/opd/create', [OpdController::class, 'create']);
    Route::get('/dashboard/opd', [OpdController::class, 'index'])->name('dashboard.opd');
    Route::post('/dashboard/opd', [OpdController::class, 'store'])->name('opd.store');
    Route::delete('/dashboard/opd/delete/{id}', [OpdController::class, 'destroy'])->name('opd.destroy');
    Route::delete('/dashboard/opd/bulk-delete', [OpdController::class, 'bulkDelete'])->name('opd.bulkDelete');
    Route::get('/dashboard/opd/edit/{opd}', [OpdController::class, 'edit'])->name('opd.edit');
    Route::put('/dashboard/opd/{opd}', [OpdController::class, 'update'])->name('opd.update');
    Route::get('/dashboard/teams', [TimController::class, 'index'])->name('dashboard.teams.index');
    Route::get('/dashboard/teams/create', [TimController::class, 'create']);
    Route::post('/dashboard/teams', [TimController::class, 'store'])->name('dashboard.teams.store');
    Route::delete('/dashboard/teams/bulk-delete', [TimController::class, 'bulkDelete'])->name('opd.bulkDelete');
    Route::get('/dashboard/teams/edit/{team}', [TimController::class, 'edit'])->name('dashboard.teams.edit');
    Route::put('/dashboard/teams/{team}', [TimController::class, 'update'])->name('dashboard.teams.update');
    Route::get('/dashboard/isp', [IspController::class, 'index'])->name('dashboard.isp.index');
    Route::get('/dashboard/isp/create', [IspController::class, 'create']);
    Route::post('/dashboard/isp', [IspController::class, 'store'])->name('dashboard.isp.store');
    Route::delete('/dashboard/isp/bulk-delete', [IspController::class, 'bulkDelete'])->name('isp.bulkDelete');
    Route::get('/dashboard/isp/edit/{isp}', [IspController::class, 'edit'])->name('dashboard.isp.edit');
    Route::put('/dashboard/isp/{isp}', [IspController::class, 'update'])->name('dashboard.isp.update');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/events/scheduled/{events:id}', [DashboardController::class, 'showEvents']);
    Route::get('/dashboard/setting', [DashboardController::class, 'setting']);
    Route::put('/dashboard/setting', [DashboardController::class, 'update'])->name('dashboard.setting.update');
    Route::get('/api/events', [EventController::class, 'apiEvents']);
    Route::get('/dashboard/events/filter/{opd_id}', [EventController::class, 'filterOPD'])->name('dashboard.events.filter');
    Route::get('dashboard/events/filter/export-pdf/{opd_id}', [EventController::class, 'exportFilterPdf'])->name('dashboard.events.exportFilterPdf');
    Route::get('dashboard/events/filter/isp/export-pdf/{isp_id}', [EventController::class, 'exportFilterIspPdf'])->name('dashboard.events.exportFilterIspPdf');
    Route::get('/dashboard/events/filter/isp/{isp_id}', [EventController::class, 'filterISP'])->name('events.filterISP');
    Route::get('/dashboard/events/export-pdf', [EventController::class, 'exportPdf'])->name('dashboard.events.exportPdf');
    Route::put('/dashboard/events/details/{id}', [EventController::class, 'details'])->name('dashboard.events.details');
    Route::get('/dashboard/events/details/pdf/{id}', [EventController::class, 'exportSingleEventPdf'])->name('dashboard.events.details.pdf');
});
