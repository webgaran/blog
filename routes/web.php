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
Auth::routes();

Route::get('/', 'ArticleController@index');
Route::middleware('auth')->get('/article/create', 'ArticleController@create');
Route::post('/article', 'ArticleController@store')->name('article.store');
Route::get('/{article}', 'ArticleController@show')->name('article.show');
Route::post('/{article}/comment', 'CommentController@store')->name('comment.store');
Route::get('/{article}/edit' , 'ArticleController@edit')->name('article.edit');
Route::patch('/{article}' ,'ArticleController@update')->name('article.update');


Route::get('/category/{category}' , 'CategoryController@index')->name('category.index');;

//Route::get('/home', 'HomeController@index')->name('home');
