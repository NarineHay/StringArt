<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\GenerateTokenController;
use App\Http\Controllers\API\MuseumListController;
use App\Http\Controllers\Turnstile\CheckQRController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::group(['prefix' => 'auth'], function ($router) {
//     Route::post('login', [AuthController::class, 'login']);
//     // Route::get('logout', [AuthController::class, 'logout']);

// });


Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    // Route::post('refresh', [AuthController::class, 'refresh');
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'apiAuthCheck'], function ($router) {
    Route::get('generate-token', GenerateTokenController::class);

});
