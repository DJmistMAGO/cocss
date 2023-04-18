<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookAppointmentController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AppointmentHistoryController;
use App\Http\Controllers\MedicineInvController;
use App\Http\Controllers\ForecastingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\UserManagementController;



Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/verify', [AuthController::class, 'verify'])->name('auth.verify');
});

Route::get('/register', [RegistrationController::class, 'create'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/book-appointment', [BookAppointmentController::class, 'index'])->name('bookAppointment.index');
    Route::get('/health-record', [HealthRecordController::class, 'index'])->name('healthRecord.index');
    Route::get('/book-appointment', [BookAppointmentController::class, 'index'])->name('bookAppointment.index');
    Route::get('/health-record', [HealthRecordController::class, 'index'])->name('healthRecord.index');
    Route::get('/health-record/view/{bookappointment}', [HealthRecordController::class, 'show'])->name('healthRecord.show');
    Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index');
    Route::get('/appointment-history', [AppointmentHistoryController::class, 'index'])->name('appointhistory.index');
    Route::get('/appointment-history/view/{bookappointment}', [AppointmentHistoryController::class, 'show'])->name('appointhistory.show');
    Route::get('/med-inv', [MedicineInvController::class, 'index'])->name('med.index');
    Route::get('/forecasting', [ForecastingController::class, 'index'])->name('forecasting.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement.index');

    Route::controller(AppointmentController::class)->group(function () {
        Route::prefix('appointment')->group(function () {
            Route::get('/', 'index')->name('appointment.index');
            Route::get('/checkup/{book_appointment}', 'edit')->name('appointment.checkup');
            Route::post('/checkup/store', 'store')->name('appointment.store');
            Route::get('/walk-in', 'walkIn')->name('appointment.walkin');
            Route::post('/walk-in/store', 'storeWalkIn')->name('appointment.storeWalkIn');
        });
    });

    Route::controller(UserManagementController::class)->group(function () {
        Route::prefix('user-management')->group(function () {
            Route::get('/user/{user}', 'view')->name('user.view');
            Route::put('/user-avatar{user}', 'updateProfile')->name('user.updateProfile');
            Route::put('/user-update/{user}', 'updateInfo')->name('user.updateInfo');
            Route::put('/user-update-pass/{user}', 'updatePassword')->name('user.updatePassword');
        });
    });
});
//
