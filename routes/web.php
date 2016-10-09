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

Route::get('/', 'HomeController@getMainPage');

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin'],function (){
    Route::get('blog/new', 'BlogController@index')->name('blog.index');
    Route::post('blog/store', 'BlogController@store')->name('blog.store');
});

Route::get('blog/show/{slug}', 'BlogController@show')->name('blog.show'); // show single blog
Route::post('comments/leave','CommentController@store')->name('comments.store');
Route::post('blog/like/{id}','BlogController@likeBlog')->name('blog.like');
Route::post('comment/like/{id}','BlogController@likeComment')->name('comment.like');

Auth::routes();

Route::get('logout', function(){
    Auth::logout(); // logout user
    return redirect('/');
});