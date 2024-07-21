<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

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




// Route untuk form input



Route::middleware("auth")->group(function() {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/employee', [EmployeeController::class, 'create'])->name('employe.create');
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employe.store');
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employe.edit');
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employe.update');
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employe.destroy');


    Route::get('/role', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');

    Route::post('/event', [EventController::class, 'store'])->name('event.store');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');

    Route::get('/event/create', function () {
        return view('event_form');
    })->name('event.create');

    Route::get('/schedules', function () {
        return view('schedules');
    })->name('schedules.index');

    Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');
    Route::post('/location/store', [LocationController::class, 'store'])->name('location.store');
    Route::get('/location/{id}/edit', [LocationController::class, 'edit'])->name('location.edit');
    Route::put('/location/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('/location/{id}', [LocationController::class, 'destroy'])->name('location.destroy');

});
