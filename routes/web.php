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

    Route::get('/recipes', 'App\Http\Controllers\RecipesController@index');

    Route::get('/recipes/add', 'App\Http\Controllers\RecipesController@add');

    Route::post('/recipes/add', 'App\Http\Controllers\RecipesController@save');

    Route::get('/recipes/view/{id}', 'App\Http\Controllers\RecipesController@view');

    Route::get('/recipes/view-with-model/{recipe}', 'App\Http\Controllers\RecipesController@viewWithModel');

    Route::get('/recipes/edit/{id}', 'App\Http\Controllers\RecipesController@edit');

    Route::post('/recipes/edit', 'App\Http\Controllers\RecipesController@update');

    Route::post('/recipes/edit/{recipe}', 'App\Http\Controllers\RecipesController@updateWithModel');

    Route::delete('/recipes/{recipe}', 'App\Http\Controllers\RecipesController@destroy');
  
});
