<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/students', [App\Http\Controllers\StudentController::class, 'index']); // read
Route::post('/students', [App\Http\Controllers\StudentController::class, 'store']); // create
Route::post('/students/{id}', [App\Http\Controllers\StudentController::class, 'update']); // update
Route::delete('/students/{id}', [App\Http\Controllers\StudentController::class, 'destroy']); // delete

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
