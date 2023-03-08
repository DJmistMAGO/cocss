<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookAppointmentController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AppointmentController;

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/verify', [AuthController::class, 'verify'])->name('auth.verify');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('regsubmit');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/book-appointment', [BookAppointmentController::class, 'index'])->name('bookAppointment.index');
    Route::get('/health-record', [HealthRecordController::class, 'index'])->name('healthRecord.index');
    Route::get('/book-appointment', [BookAppointmentController::class, 'index'])->name('bookAppointment.index');
    Route::get('/health-record', [HealthRecordController::class, 'index'])->name('healthRecord.index');
    Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index');
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
});

