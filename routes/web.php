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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users','UserController@index')->name('users.index');

Route::get('/posts','PostController@index')->name('posts.index');

Route::get('post/create','PostController@create')->name('post.create');

Route::post('post/store','PostController@store')->name('post.store');

Route::get('post/delete/{id}','PostController@delete')->name('post.delete');

Route::get('post/edit/{id}','PostController@edit')->name('post.edit');

Route::post('post/update/{id}','PostController@update')->name('post.update');

Route::get('post/like/{id}','PostController@likePost')->name('post.like');
Route::get('post/dislike/{id}','PostController@dislikePost')->name('post.dislike');

Route::resource('comment','CommentController');

Route::group(['middleware'=>'CheckAuth'],function(){
	Route::resource('/student','StudentController');
});




