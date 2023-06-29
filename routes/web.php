<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'home']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'login'])->name('postlogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/postregister', [AuthController::class, 'registerSave'])->name('postregister');
Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');
