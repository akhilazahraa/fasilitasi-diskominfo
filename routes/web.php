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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/api/events', [DashboardController::class, 'getEvents'])->name('events.get');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::middleware(['auth', 'role:ADMIN'])->group(function () {
    Route::get('/dashboard/events/create', [DashboardController::class, 'addEvents']);
    Route::post('/dashboard/events', [DashboardController::class, 'store'])->name('events.store');
    Route::get('/dashboard/events', [DashboardController::class, 'list'])->name('dashboard.events.index');
});
Route::get('/dashboard/scheduled', [DashboardController::class, 'upcomingEvents']);
Route::get('/dashboard/events/scheduled/details', [DashboardController::class, 'detailsEvents']);
Route::get('/dashboard/events/scheduled', [DashboardController::class, 'upcomingEvents'])->middleware('auth');
Route::get('/dashboard/events/scheduled/previous', [DashboardController::class, 'previousEvents'])->middleware('auth');
Route::get('/dashboard/setting', [DashboardController::class, 'setting'])->middleware('auth');
Route::get('/dashboard/events/scheduled/{events:id}', [DashboardController::class, 'showEvents']);
Route::get('/dashboard/events/scheduled', [DashboardController::class, 'upcomingEvents'])->middleware('auth');
Route::get('/dashboard/events/scheduled/previous', [DashboardController::class, 'previousEvents'])->middleware('auth');
Route::get('/dashboard/setting', [DashboardController::class, 'setting'])->middleware('auth');
