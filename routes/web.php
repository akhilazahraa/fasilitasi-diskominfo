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
    Route::get('/dashboard/events/{id}/edit', [DashboardController::class, 'edit'])->name('dashboard.events.edit');
    Route::put('/dashboard/events/{id}', [DashboardController::class, 'update'])->name('dashboard.events.update');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/scheduled', [DashboardController::class, 'upcomingEvents']);
    Route::get('/dashboard/events/scheduled', [DashboardController::class, 'upcomingEvents']);
    Route::get('/dashboard/events/scheduled/previous', [DashboardController::class, 'previousEvents']);
    Route::get('/dashboard/events/scheduled/{events:id}', [DashboardController::class, 'showEvents']);
    Route::get('/dashboard/setting', [DashboardController::class, 'setting']);
});