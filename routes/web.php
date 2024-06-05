<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/clear-cache', function () {
    //   $run = Artisan::call('migrate');
    // $run = Artisan::call('db:seed --class=UserInfoSeeder');
    $run = Artisan::call('migrate:fresh --seed');

    //   $run = Artisan::call('make:model Telegram_Workload');
    // $run = Artisan::call('config:clear');
    // $run = Artisan::call('cache:clear');
    // $run = Artisan::call('config:cache');
    //   $run = Artisan::call('make:command CalculateTheRatingOfThePartiesCron --command=calculate_the_rating_of_the_parties:cron');
    // $run = Artisan::call('demo:cron');

    return 'FINISHED';
});
