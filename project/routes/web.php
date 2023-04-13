<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Models\Announcement;
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

Route::controller(AuthenticationController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/auth', 'auth');
    Route::get('/signup', 'signup')->name('signup');
    Route::post('/register', 'register');

    Route::middleware('auth')->group(function() {
        Route::get('/logout', 'logout')->name('logout');
    });
});


Route::controller(UserController::class)->group(function() {
    Route::middleware('auth')->group(function() {
        Route::get('/', 'home');
        Route::get('/announcements', [AnnouncementController::class, 'index']);

        Route::prefix('/users')->group(function() {
            Route::get('/{user}/edit', 'edit');
            Route::get('/{user}', 'profile');
        });
    });
    
    
});



Route::prefix('/admin')->group(function() {
    Route::controller(AdminController::class)->group(function() {
        Route::middleware('auth')->group(function() {
            Route::get('/', 'index');
        });
    });
    
});


