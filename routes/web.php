<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScheduleController;
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
    Route::get('/dashboard/events/create', [DashboardController::class, 'addEvents']);
    Route::post('/dashboard/events', [DashboardController::class, 'store'])->name('events.store');
    Route::get('/dashboard/events', [DashboardController::class, 'list'])->name('dashboard.events.index');
    Route::delete('/dashboard/events/delete/{id}', [DashboardController::class, 'destroy'])->name('events.destroy');
    Route::get('/dashboard/events/edit/{id}', [DashboardController::class, 'edit'])->name('dashboard.events.edit');
    Route::put('/dashboard/events/{id}', [DashboardController::class, 'update'])->name('dashboard.events.update');
    Route::get('dashboard/reports', [DashboardController::class, 'report'])->name('dashboard.report');
    Route::get('dashboard/user', [DashboardController::class, 'showUser'])->name('dashboard.user');
    Route::get('dashboard/user/edit/{id}', [DashboardController::class, 'editUser'])->name('dashboard.user.edit');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/scheduled', [DashboardController::class, 'upcomingEvents']);
    Route::get('/dashboard/events/scheduled', [DashboardController::class, 'upcomingEvents']);
    Route::get('/dashboard/events/scheduled/previous', [DashboardController::class, 'previousEvents']);
    Route::get('/dashboard/events/scheduled/{events:id}', [DashboardController::class, 'showEvents']);
    Route::get('/dashboard/setting', [DashboardController::class, 'setting']);
    Route::get('/dashboard/reports/my-reports', [DashboardController::class, 'userReports'])->name('dashboard.report.myreports');
    Route::get('dashboard/reports/create', [DashboardController::class, 'createReport']);
    Route::post('dashboard/reports', [DashboardController::class, 'storeReport'])->name('dashboard.report.store');
    Route::get('/dashboard/reports/edit/{id}', [DashboardController::class, 'editReport'])->name('dashboard.report.edit');
    Route::put('/dashboard/reports/{id}', [DashboardController::class, 'updateReport'])->name('dashboard.report.update');
    Route::delete('/dashboard/reports/delete/{id}', [DashboardController::class, 'deleteReport'])->name('report.destroy');
    Route::get('/dashboard/reports/{events:id}', [DashboardController::class, 'showReport']);
});