<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Client\ListClientController;
use App\Http\Controllers\Client\ShowClientController;
use App\Http\Controllers\Client\EditClientController;
use App\Http\Controllers\Client\StoreClientController;
use App\Http\Controllers\Client\CreateClientController;
use App\Http\Controllers\Client\UpdateClientController;

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
});

require __DIR__.'/auth.php';
