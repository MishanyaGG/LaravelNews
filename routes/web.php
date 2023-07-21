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

session_start();

// Главная страница
Route::get('/','NewsController@index')->name('index');

Route::get('/old','NewsController@old')->name('old');

// GET, POST URL - создание новости
Route::match(['get','post'],'/editNews','NewsController@create')->name('newsCreate');

// Подробная информация новости
Route::get('/newsMore/{id}','NewsController@more')->name('newsMore');

Route::post('/findByCategory','NewsController@findByCategory')->name('findByCategory');

// Удаление новости
Route::get('/newsDelete/{id}','NewsController@delete')->name('newsDelete');

// Изменение новости
Route::match(['get','post'],'/newsUpdate/{id}','NewsController@update')->name('newsUpdate');

// Создание новости
Route::match(['get','post'],'/categoryCreate','CategoriesController@create')->name('categoryCreate');

// Изменение новости
Route::match(['get','post'],'/categoryUpdate/{id?}','CategoriesController@update')->name('categoryUpdate');

// Удаление новости
Route::get('/categoryDelete/{id?}','CategoriesController@delete')->name('categoryDelete');

Route::match(['get','post'],'/login','UsersController@login')->name('login');

Route::get('/logOut','UsersController@logOut')->name('logOut');

