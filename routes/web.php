<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\seriesController;
use App\Http\Controllers\SeriesController as ControllersSeriesController;
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

Route::get('/', function () {
    return redirect("/series");
});
Route::get('/series', [SeriesController::class, 'index']);
Route::get('/series/create', [SeriesController::class, 'create']);
Route::get('/series/edit/{series}', [SeriesController::class, 'edit']);
Route::post('/series/update/{series}', [SeriesController::class, 'update']);
Route::post('/series/store', [SeriesController::class, 'store']);
Route::post('/series/destroy/{series}', [seriesController::class, 'destroy']);

Route::get('/series/{series}/seasons', [SeasonsController::class, "index"]);