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

Route::post('/{id}/listCategorized', [App\Http\Controllers\AdvertisementsController::class, 'AllAdsCategorized'])->name('AllAdsCategorized');


Route::group(['prefix'=>'ads', 'middleware' => 'auth'], function (){
    Route::get('/list', [App\Http\Controllers\AdvertisementsController::class, 'list'])->name('list');
    Route::get('/{id}/listCategorized', [App\Http\Controllers\AdvertisementsController::class, 'categorizedList'])->name('categorizedList');
    Route::get('/create', [App\Http\Controllers\AdvertisementsController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\AdvertisementsController::class, 'store'])->name('store');
    Route::get('/delete', [App\Http\Controllers\AdvertisementsController::class, 'delete'])->name('delete');
    Route::post('/{id}/edit', [App\Http\Controllers\AdvertisementsController::class, 'edit']);
    Route::post('/{id}/destroy', [App\Http\Controllers\AdvertisementsController::class, 'destroy']);
});




Route::group(['prefix'=>'comments', 'middleware' => 'auth'], function (){
    Route::get('/list', [App\Http\Controllers\CommentsController::class, 'list'])->name('commentList');
    Route::get('/create', [App\Http\Controllers\CommentsController::class, 'create'])->name('commentCreate');
    Route::post('/store', [App\Http\Controllers\CommentsController::class, 'store'])->name('commentStore');
    Route::post('/store2', [App\Http\Controllers\CommentsController::class, 'store2'])->name('commentStore');
    Route::get('/delete', [App\Http\Controllers\CommentsController::class, 'delete'])->name('commentDelete');
    Route::post('/{id}/edit', [App\Http\Controllers\CommentsController::class, 'edit']);
    Route::post('/{id}/destroy', [App\Http\Controllers\CommentsController::class, 'destroy']);
});


Route::group(['prefix'=>'favourites', 'middleware' => 'auth'], function (){
    Route::get('/list', [App\Http\Controllers\FavouritesController::class, 'list'])->name('favouritesList');
    Route::get('/create', [App\Http\Controllers\FavouritesController::class, 'create'])->name('favouritesCreate');
    Route::post('/store', [App\Http\Controllers\FavouritesController::class, 'store'])->name('favouritesStore');
    Route::get('/delete', [App\Http\Controllers\FavouritesController::class, 'delete'])->name('favouritesDelete');
    Route::post('/{id}/edit', [App\Http\Controllers\FavouritesController::class, 'edit']);
    Route::post('/{id}/destroy', [App\Http\Controllers\FavouritesController::class, 'destroy']);
});

