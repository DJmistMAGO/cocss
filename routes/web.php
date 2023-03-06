<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookAppointmentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home');
Route::get('/book-appointment', [BookAppointmentController::class, 'index'])->name('bookAppointment.index');
