<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\AdvertisementsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentsController;
use App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

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

Route::get('/{id}/AdsByOneCategory', [App\Http\Controllers\AdvertisementsController::class, 'AdsByOneCategory'])->name('AllAdsCategorized');


Route::group(['prefix'=>'ads', 'middleware' => 'auth'], function (){
    Route::get('/userAdsList', [App\Http\Controllers\AdvertisementsController::class, 'userAdsList'])->name('list');
    Route::get('/{id}/UserAdsByOneCategory', [App\Http\Controllers\AdvertisementsController::class, 'UserAdsByOneCategory'])->name('categorizedList');
    Route::get('/create', [App\Http\Controllers\AdvertisementsController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\AdvertisementsController::class, 'store'])->name('store');
    Route::get('/delete', [App\Http\Controllers\AdvertisementsController::class, 'delete'])->name('delete');
    Route::post('/{id}/edit', [App\Http\Controllers\AdvertisementsController::class, 'edit']);
    Route::post('/{id}/destroy', [App\Http\Controllers\AdvertisementsController::class, 'destroy']);
    Route::get('/favourites', [App\Http\Controllers\AdvertisementsController::class, 'favourites'])->name('favourites');
});


Route::group(['prefix'=>'comments', 'middleware' => 'auth'], function (){
    Route::get('/list', [App\Http\Controllers\CommentsController::class, 'list'])->name('commentList');
    Route::get('/create', [App\Http\Controllers\CommentsController::class, 'create'])->name('commentCreate');
    Route::post('/store', [App\Http\Controllers\CommentsController::class, 'store'])->name('commentStore');
    Route::post('/store2', [App\Http\Controllers\CommentsController::class, 'store2'])->name('commentStore');
    Route::get('/delete', [App\Http\Controllers\CommentsController::class, 'delete'])->name('commentDelete');
    Route::post('/{id}/edit', [App\Http\Controllers\CommentsController::class, 'edit']);
});


Route::group(['prefix'=>'favourites', 'middleware' => 'auth'], function (){
    Route::post('/store', [App\Http\Controllers\FavouritesController::class, 'store'])->name('favouritesStore');
    Route::post('/{id}/edit', [App\Http\Controllers\FavouritesController::class, 'edit']);
    
});

Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function (){
    Route::GET('/home', [App\Http\Controllers\AdminController::class, 'home'])->name('adminHome');
    Route::get('/listAds', [App\Http\Controllers\AdminController::class, 'listAds'])->name('listAds');
    Route::post('/{id}/destroy', [App\Http\Controllers\AdminController::class, 'destroy']);
    
    Route::GET('/{id}/comments', [App\Http\Controllers\AdminController::class, 'comments']);
    Route::post('/{id}/commentDelete', [App\Http\Controllers\AdminController::class, 'commentDelete']);    
    
    Route::GET('/{id}/favourites', [App\Http\Controllers\AdminController::class, 'favourites']);
    
    Route::get('/listCategories', [App\Http\Controllers\AdminController::class, 'listCategories'])->name('listCategories');
    Route::POST('/{id}/editCategories', [App\Http\Controllers\AdminController::class, 'editCategories'])->name('editCategories');
    Route::post('/{id}/destroyCategories', [App\Http\Controllers\AdminController::class, 'destroyCategories'])->name('destroyCategories');
    Route::post('/createCategories', [App\Http\Controllers\AdminController::class, 'createCategories'])->name('createCategories');
    Route::POST('/storeCategories', [App\Http\Controllers\AdminController::class, 'storeCategories'])->name('storeCategories');
    Route::POST('/{id}/AdminListAdsOfThisCategory', [App\Http\Controllers\AdminController::class, 'AdminListAdsOfThisCategory'])->name('AdminListAdsOfThisCategory');

    Route::get('/listAdmins', [App\Http\Controllers\AdminController::class, 'listAdmins'])->name('listAdmins');
    Route::post('/{id}/destroyAdmins', [App\Http\Controllers\AdminController::class, 'destroyAdmins'])->name('destroyAdmins');
    Route::get('/createAdmins', [App\Http\Controllers\AdminController::class, 'createAdmins'])->name('createAdmins');
    
});