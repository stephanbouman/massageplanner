<?php

use App\Http\Controllers\Appointment\CreateAppointmentController;
use App\Http\Controllers\Appointment\EditAppointmentController;
use App\Http\Controllers\Appointment\ShowAppointmentController;
use App\Http\Controllers\Appointment\StoreAppointmentController;
use App\Http\Controllers\Appointment\UpdateAppointmentController;
use App\Http\Controllers\Client\CreateClientController;
use App\Http\Controllers\Client\EditClientController;
use App\Http\Controllers\Client\ListClientController;
use App\Http\Controllers\Client\ShowClientController;
use App\Http\Controllers\Client\StoreClientController;
use App\Http\Controllers\Client\UpdateClientController;
use App\Http\Controllers\ListAppointmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/clients', ListClientController::class)->name('clients.index');
    Route::post('/clients', StoreClientController::class)->name('clients.store');
    Route::get('/clients/create', CreateClientController::class)->name('clients.create');
    Route::get('/clients/{client}', ShowClientController::class)->name('clients.show');
    Route::get('/clients/{client}/edit', EditClientController::class)->name('clients.edit');
    Route::patch('/clients/{client}/edit', UpdateClientController::class)->name('clients.update');

    Route::get('/clients/{client}/appointment/create', CreateAppointmentController::class)->name('appointment.create');
    Route::post('/clients/{client}/appointment', StoreAppointmentController::class)->name('appointment.store');

    Route::get('/clients/{client}/appointment/{appointment}', ShowAppointmentController::class)->name('appointment.show');
    Route::get('/clients/{client}/appointment/{appointment}/edit', EditAppointmentController::class)->name('appointment.edit');
    Route::patch('/clients/{client}/appointment/{appointment}/edit', UpdateAppointmentController::class)->name('appointment.update');

    Route::get('/appointments', ListAppointmentController::class)->name('appointment.index');

});

require __DIR__.'/auth.php';
