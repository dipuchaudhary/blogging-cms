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




Route::get('/', 'FrontController@index')->name('index');

Route::get('/post/{slug}','FrontController@singlePost')->name('post.single');

Route::get('/category/{id}','FrontController@singleCategory')->name('category.single');

Route::get('/tag/{id}','FrontController@tag')->name('tag.single');

Route::get('/results',function (){

    $posts = \App\Post::where('title','like','%'.request('query').'%')->get();

    return view('result')->with('posts',$posts)
                                ->with('title','Search results:'.request('query'))
                                ->with('setting', \App\SiteSetting::first())
                                ->with('categories',\App\Category::all()->take(5))
                                 ->with('tags',\App\Tag::all())
                                 ->with('query',request('query')) ;
})->name('results');

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

    Route::get('settings','SiteSettingController@index')->name('setting.index');

    Route::post('settings/update','SiteSettingController@update')->name('setting.update');


});


