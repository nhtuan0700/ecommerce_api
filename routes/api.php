<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;

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

Route::group(['as' => 'product.', 'prefix' => 'product'], function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->middleware('auth:api');
    });
});

Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/', 'index');
    });
});

Route::group(['as' => 'auth.', 'prefix' => 'auth', 'gaurds' => 'api'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout']);
    // Route::post('/refresh', [AuthController::class, 'refresh']);
    // Route::get('/user-profile', [AuthController::class, 'userProfile']);
    // Route::post('/change-pass', [AuthController::class, 'changePassWord']);
});
