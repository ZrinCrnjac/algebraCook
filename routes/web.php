<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['web']], function () {

    Route::get('/recipes', [App\Http\Controllers\RecipesController::class, 'index']);

    Route::get('/recipes/add', 'App\Http\Controllers\RecipesController@add');

    Route::post('/recipes/add', 'App\Http\Controllers\RecipesController@save');
  
});
