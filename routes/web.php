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
    return view('table');
});

Route::get('/fake', 'TodoController@fakeDate');

Route::get('/delete/{id}', 'TodoController@delete')->name('delete');

Route::post('/add', 'TodoController@addTodo')->name('add');


Route::get('/get', 'TodoController@get');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Category
Route::get('/getcate', 'CategoryController@get');

Route::get('/gettodo', 'TodoController@getJson');
