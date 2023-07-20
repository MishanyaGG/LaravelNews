<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Главная страница
Route::get('/','NewsController@index')->name('index');

// GET, POST URL - создание новости
Route::match(['get','post'],'/editNews','NewsController@create')->name('newsCreate');

