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
    return view('start');
});

/*Auth::routes();*/

//Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register', 'UserController@save')->name('register');
Route::post('/login', 'UserController@loggin')->name('loggin');
Route::get('/login', 'UserController@loggingshow');
Route::get('/register', 'UserController@registershow');
