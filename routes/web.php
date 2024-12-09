<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PatientForm;
use App\Livewire\PatientIndex;
use App\Livewire\Auth\Register;
use App\Livewire\DoctorForm;

Route::get('/register', Register::class)->name('register');

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


//Doctor Routes
Route::get('/doctor/create/{user_id}', [DoctorForm::class, 'create'])->name('doctor.create');
Route::post('/doctor/store', [DoctorForm::class, 'store'])->name('doctor.store');
