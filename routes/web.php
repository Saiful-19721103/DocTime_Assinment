<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\PatientAuthController;

//Frontend Controller[ For Home Page]
Route::get('/', [ FrontendController::class, 'showHomePage'])->name('home.page');
//Frontend Controller[ For Login Page]
Route::get('/login', [ FrontendController::class, 'showLoginPage'])->name('login.page');

//Frontend Controller[ For Patient Register and dashboard Page]
Route::get('/patient-register', [ FrontendController::class, 'showPatientRegisterPage'])->name('patient.reg.page');
Route::get('/patient-dashboard', [ FrontendController::class, 'showPatientDashboardPage'])->name('patient.dash.page')->middleware('patient');

//Patient Auth Controller[ For Patient Register Page]
Route::post('/patient-register', [ PatientAuthController::class, 'register'])->name('patient.register');
//Patient Auth Controller[ For Patient login Page]
Route::post('/patient-login', [ PatientAuthController::class, 'login'])->name('patient.login');
//Patient Auth Controller[ For Patient logOut Page]
Route::get('/patient-logout', [ PatientAuthController::class, 'logout'])->name('patient.logout');



//Frontend Controller[ For Doctor Register and dashboard Page]
Route::get('/doctor-register', [ FrontendController::class, 'showDoctorRegisterPage'])->name('doctor.reg.page');
Route::get('/doctor-dashboard', [ FrontendController::class, 'showDoctorDashboardPage'])->name('doctor.dash.page');
