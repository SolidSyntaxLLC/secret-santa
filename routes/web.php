<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email/verify/{id}/{hash}', \App\Http\Controllers\Auth\VerifyEmailController::class)->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verification-notification', [\App\Http\Controllers\Auth\EmailVerificationNotificationController::class, 'store'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\EventController::class, 'index'])->name('dashboard');

    Route::prefix('event')->group(function () {
        Route::name('events.')->group(function () {
            Route::get('/', [\App\Http\Controllers\EventController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\EventController::class, 'store'])->name('store');
            Route::get('/{id}', [\App\Http\Controllers\EventController::class, 'show'])->name('show');
            Route::post('/{id}', [\App\Http\Controllers\EventController::class, 'update'])->name('update');
            Route::get('/{id}/edit', [\App\Http\Controllers\EventController::class, 'edit'])->name('edit');
            Route::get('/{id}/delete', [\App\Http\Controllers\EventController::class, 'destroy'])->name('destroy');
        });

        Route::name('attendees.')->group(function () {
            Route::get('/{id}/attendees', [\App\Http\Controllers\EventController::class, 'index'])->name('index');
            Route::get('/{id}/attendees/create', [\App\Http\Controllers\AttendeeController::class, 'create'])->name('create');
            Route::post('/{id}/attendees/create', [\App\Http\Controllers\AttendeeController::class, 'store'])->name('store');
            Route::get('/{id}/attendees/{attendee}', [\App\Http\Controllers\AttendeeController::class, 'show'])->name('show');
            Route::get('/{id}/attendees/{attendee}/edit', [\App\Http\Controllers\AttendeeController::class, 'edit'])->name('edit');
            Route::post('/{id}/attendees/{attendee}/edit', [\App\Http\Controllers\AttendeeController::class, 'update'])->name('update');
            Route::get('/{id}/attendees/{attendee}/delete', [\App\Http\Controllers\AttendeeController::class, 'destroy'])->name('destroy');
        });
    });
});

require __DIR__.'/auth.php';
