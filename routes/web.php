<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('home');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('user')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::post('/update', [UserController::class, 'update'])->name('user.update');
        Route::post('/update-password', [UserController::class, 'changePassword'])->name('user.update.password');
    });

    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/create', [UserController::class, 'create'])->name('admin.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.store');
        Route::get('/update/{id}', [UserController::class, 'adminUpdate'])->name('admin.update');
        Route::get('/delete/{id}', [UserController::class, 'adminDelete'])->name('admin.delete');
    });
});
