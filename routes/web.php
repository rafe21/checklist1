<?php

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
Route::group(['prefix'=>'tasks','as'=>'TaskController@'], function(){
    Route::get('/edit', 'TaskController@edit')->name('edit');
    Route::post('/update', 'TaskController@updateByModal')->name('updateByModal');
    Route::get('category-has-many','TaskController@getCategoryTasks')->name('getCategoryTasks');
    
});

Route::resource('/tasks', 'TaskController');
// Auth::route(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Auth::route();

Route::get('/home', 'HomeController@index')->name('home');
