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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('posts','PostsController');

    Route::resource('category','CategoryController');

    Route::get('trashed-posts','PostsController@trashed')->name('posts.trashed');

    Route::get('restore-posts/{post}','PostsController@restore')->name('restore-post');

    Route::resource('tags','TagController');

    Route::resource('users','UsersController');

    Route::get('users/admin/{id}','UsersController@makeAdmin')->name('users.admin');

    Route::get('users/not-admin/{id}','UsersController@notAdmin')->name('users.not.admin');

    Route::get('user/profile','ProfileController@index')->name('user.profile');

    Route::post('users/profile/update','ProfileController@update')->name('user.profile.update');
});


