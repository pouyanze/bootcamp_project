<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\AdsController;
use App\Http\Middleware;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::group(['prefix'=>'user', 'middleware' => 'auth'], function (){
    Route::get('/ads', [App\Http\Controllers\AdsController::class, 'index']);
    Route::get('/create', [App\Http\Controllers\AdsController::class, 'create']);
    Route::get('/delete', [App\Http\Controllers\AdsController::class, 'delete']);
});
