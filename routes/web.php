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

Route::get('/', function () {
    return view('home');
});

Route::get('login', function () {
    return view('auth.login');
});

Route::get('/', [HomeController::class, 'getHome']);

Route::get('catalog', [CatalogController::class, 'getIndex']);

Route::get('catalog/show/{id}', [CatalogController::class, 'getShow']);

Route::get('catalog/create', [CatalogController::class, 'getCreate']);

Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit']);

Route::post('logout', function () {
    return "Saliendo de la sesión";
});