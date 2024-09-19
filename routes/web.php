<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterMailController;

Route::get('/register-form', function () {
    return view('register-mail');
})->name('register.form');
Route::post('submit-form', [RegisterMailController::class, 'register'])->name('submit.form');
