<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('user')->group(function () {
//     Route::patch('/update', [UserController::class, 'update']);
//     Route::patch('/update-password', [UserController::class, 'changePassword']);
// });

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api', 'role:Admin'])->group(function () {
    
    Route::post('/user', [UserController::class, 'index']);
});