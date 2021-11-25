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
    Route::get('/event', [\App\Http\Controllers\EventController::class, 'create'])->name('events.create');
    Route::post('/event', [\App\Http\Controllers\EventController::class, 'store'])->name('events.store');
    Route::get('/event/{id}', [\App\Http\Controllers\EventController::class, 'show'])->name('events.show');
    Route::post('/event/{id}', [\App\Http\Controllers\EventController::class, 'update'])->name('events.update');
    Route::get('/event/{id}/edit', [\App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');
    Route::get('/event/{id}/delete', [\App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy');
});

require __DIR__.'/auth.php';
