<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Patient Routes
Route::get('/patients', PatientIndex::class)->name('patients.index');
Route::get('/patients/create', PatientForm::class)->name('patients.create');
Route::get('/patients/{id}/edit', PatientForm::class)->name('patients.edit');
