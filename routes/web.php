<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

//Frontend Controller[ For Home Page]
Route::get('/', [ FrontendController::class, 'showHomePage'])->name('home.page');