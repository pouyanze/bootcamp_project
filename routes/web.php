<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\AdvertisementsController;
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

Route::get('/home', [App\Http\Controllers\AdvertisementsController::class, 'AllAds'])->name('AllAds');

Route::get('/', [App\Http\Controllers\AdvertisementsController::class, 'AllAds'])->name('AllAds');

Route::group(['prefix'=>'ads', 'middleware' => 'auth'], function (){
    Route::get('/list', [App\Http\Controllers\AdvertisementsController::class, 'list'])->name('list');
    Route::get('/create', [App\Http\Controllers\AdvertisementsController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\AdvertisementsController::class, 'store'])->name('store');
    Route::get('/delete', [App\Http\Controllers\AdvertisementsController::class, 'delete'])->name('delete');
    Route::post('/{id}/edit', [App\Http\Controllers\AdvertisementsController::class, 'edit']);
    Route::post('/{id}/destroy', [App\Http\Controllers\AdvertisementsController::class, 'destroy']);
});
