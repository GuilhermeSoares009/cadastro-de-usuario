<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\JwtMiddleware; // Remova o "as JwtVerifyMiddleware" se não for necessário
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [UserController::class, 'store'])->name('users.store');
Route::post('/login', [UserController::class, 'login'])->name('users.login');

Route::group(['prefix' => 'v1', 'middleware' => JwtMiddleware::class], function () {
    Route::post('logout', [UserController::class, 'logout'])->name('users.logout');
});
