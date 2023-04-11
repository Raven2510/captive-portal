<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(UserController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/auth', 'auth');
    Route::get('/signup', 'signup')->name('signup');
    Route::post('/register', 'register');

    Route::middleware('auth')->group(function() {
        Route::get('/admin', 'adminPanel');
        Route::get('/', 'home');
        Route::get('/logout', 'logout')->name('logout');
    });
});