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
    Route::get('/status', 'TaskController@status')->name('status');
    
});
Route::resource('/tasks', 'TaskController');
Route::resource('/category', CategorisController::class);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Auth::routes();
Auth::routes(['verify'=>true]);


