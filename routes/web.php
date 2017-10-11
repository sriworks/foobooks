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

Route::get('/', 'WelcomeController');

// Sample for error route.
Route::get('/example', function () {
    return view('abc');
});

// Books gome
Route::get('/book/', 'BookController@index');

// Get One book by title
Route::get('/book/{title}', 'BookController@get');
