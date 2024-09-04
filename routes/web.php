<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboard\RoomController;
use App\Http\Controllers\dashboard\ProfileController;
use App\Http\Controllers\dashboard\StudentController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\MenuController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\StudentController as UserStudentController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

Route::controller(AuthController::class)->group(function () {

    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/', 'login_view')->name('login');
    Route::post('/', 'login');

    Route::get('/register', 'register_view')->name('register');
    Route::post('/register', 'register');
    });

    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(Authenticate::class)->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/admin/profile', 'index')->name('admin.profile');
        Route::prefix('/admin/profile/')->name('admin.profile.')->group(function () {
            Route::patch('details', 'details')->name('details');
            Route::patch('password', 'password')->name('password');
            Route::patch('picture', 'picture')->name('picture');
        });
    });
    
    Route::controller(RoomController::class)->group(function () {
        Route::get('/admin/room', 'index')->name('admin.room');
    });
    
    Route::controller(StudentController::class)->group(function () {
        Route::get('/admin/student', 'index')->name('admin.student');
        Route::prefix('admin/student/')->name('admin.student.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{student}/show', 'show')->name('show');
            Route::get('{student}/edit', 'edit')->name('edit');
            Route::patch('{student}/update', 'update')->name('update');
            Route::patch('{student}/picture', 'picture')->name('picture');
            Route::delete('{student}/destroy', 'destroy')->name('destroy');
        });
    });
    
    Route::controller(MenuController::class)->group(function () {
        Route::get('/admin/menu', 'index')->name('admin.menu');
        Route::prefix('admin/menu/')->name('admin.menu.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{menu}/edit', 'edit')->name('edit');
            Route::patch('{menu}/edit', 'update');
            Route::delete('{menu}/destroy', 'destroy')->name('destroy');
        });
    });
    
    Route::controller(UserDashboardController::class)->group(function () {
        Route::get('/user/dashboard', 'index')->name('user.dashboard');
        Route::prefix('user/dashboard/')->name('user.dashboard.')->group(function () {
            Route::get('about', 'about')->name('about');
            Route::get('service', 'service')->name('service');
            Route::get('contact', 'contact')->name('contact');
        });
    });
    
    Route::controller(UserStudentController::class)->group(function () {
        Route::get('/user/student', 'index')->name('user.student');
    });
});


