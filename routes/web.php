<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/',['as'=>'blog','uses'=>'PageController@getIndex']);
Route::resource('post', 'PostController');
Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');


Auth::routes();
Route::get('/dashboard',['as'=>'dashboard','uses'=>'HomeController@index']);
Route::get('/dashboard/profile',['as'=>'profile','uses'=>'HomeController@getProfile']);

Route::get('/login',['as'=>'login','uses'=>'Auth\LoginController@showLoginForm']);
Route::get('/logout',['as'=>'logout','uses'=>'HomeController@logout']);
Route::resource('categories','CategoryController',['except'=>['create']]);
//comments
Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit','as'=>'comments.edit']);
Route::put('comments/{id}',['uses'=>'CommentsController@update','as'=>'comments.update']);
Route::delete('comments/{id}',['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);
Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete','as'=>'comments.delete']);

Route::resource('profile','ProfileController',['except'=>['index']]);