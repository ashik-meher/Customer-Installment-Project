<?php

use App\Http\Controllers\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

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




// Exposing public API for Test

Route::get('/articles', [ArticleController::class, 'index']);

Route::post('login', [App\Http\Controllers\ApiUserController::class, 'login']);

Route::post('register', [App\Http\Controllers\ApiUserController::class, 'register']);


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', [ApiUserController::class, 'details']);

    Route::get('customer-installments', [App\Http\Controllers\CustomerInstallmentController::class, 'index']);
});

// Customer Installation Project 

Route::resource('customers', App\Http\Controllers\CustomerController::class);

Route::resource('installments', App\Http\Controllers\InstallmentController::class);
