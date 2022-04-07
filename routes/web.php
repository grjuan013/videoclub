<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;

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
Route::get('/', function () {
    return view('home');
});

/*Route::get('login', function () {
    return view('auth.login');
});

Route::group(['namespace' => 'Admin'], function() {
    Route::resource('catalog', [CatalogController::class, 'getIndex']);
    Route::resource('catalog/show/{id}', [CatalogController::class, 'getShow']);
    Route::resource('catalog/create', [CatalogController::class, 'getCreate']);
    Route::resource('catalog/edit/{id}', [CatalogController::class, 'getEdit']);
});*/

// Route::group(['namespace' => 'Admin',
//             'prefix' => 'admin',
//             'middleware' => 'auth'], function() {
//     Route::get('catalog', [CatalogController::class, 'getIndex']);
//     Route::get('catalog/show/{id}', [CatalogController::class, 'getShow']);
//     Route::get('catalog/create', [CatalogController::class, 'getCreate']);
//     Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit']);
// });

Route::get('/', [HomeController::class, 'getHome']);

// Route::get('catalog', [CatalogController::class, 'getIndex']);

// Route::get('catalog/show/{id}', [CatalogController::class, 'getShow']);

// Route::get('catalog/create', [CatalogController::class, 'getCreate']);

// Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit']);

// Route::post('logout', function () {
//     return "Saliendo de la sesión";
// });

Route::group(['middleware' => 'auth'], function () {
    Route::get('catalog', [CatalogController::class, 'getIndex']);

    Route::get('catalog/show/{id}', [CatalogController::class, 'getShow']);

    Route::get('catalog/create', [CatalogController::class, 'getCreate']);

    Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit']);

    Route::post('catalog/create',[CatalogController::class, 'postCreate']);
    Route::put('catalog/edit/{id}',[CatalogController::class, 'putEdit']);

    Route::put('catalog/rent/{id}',[CatalogController::class, 'putRent']);
    Route::put('catalog/return/{id}',[CatalogController::class, 'putReturn']);
    Route::delete('catalog/delete/{id}',[CatalogController::class, 'deleteMovie']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
