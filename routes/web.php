<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurveyController;
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

Route::get('/{slug}', [HomeController::class, 'home'])->name('home');

Route::prefix('survey')->as('survey.')->middleware('checkCache')->group(function () {
    Route::get('start', [SurveyController::class, 'start'])->name('start');
    Route::post('info/store', [SurveyController::class, 'storeInfo'])->name('info.store');
    Route::get('{user}/finish', [SurveyController::class, 'finish'])->name('finish');
});
