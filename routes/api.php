<?php

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




// ======================== turnstile Турникет ======================================
Route::group(['prefix' => 'turnstile'], function ($router) {

      Route::get('museums', MuseumListController::class);

});

