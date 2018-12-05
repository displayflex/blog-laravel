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

Route::get('/', 'PostController@index')
	->name('site.post.index');

Route::get('/test', 'PostController@test')
	->name('site.post.test'); // TODO: delete this

Route::group(['prefix' => 'post'], function() {
	Route::get('/{id}', 'PostController@post')
		->where('id', '[0-9]+')
		->name('site.post.post');
	Route::get('/add', 'PostController@add')
		->name('site.post.add');
	Route::post('/add', 'PostController@add')
		->name('site.post.add');
	Route::get('/edit/{id}', 'PostController@edit')
		->where('id', '[0-9]+')
		->name('site.post.edit');
	Route::post('/edit/{id}', 'PostController@edit')
	->where('id', '[0-9]+')
	->name('site.post.edit');
	Route::get('/delete/{id}', 'PostController@delete')
		->where('id', '[0-9]+')
		->name('site.post.delete');
	Route::post('/delete/{id}', 'PostController@delete')
		->where('id', '[0-9]+')
		->name('site.post.delete');
});

Route::group(['prefix' => 'user'], function() {
	Route::get('/sign-up', 'UserController@signUp')
		->name('site.user.signUp');
	Route::post('/sign-up', 'UserController@signUpPost')
		->name('site.user.signUpPost');
	Route::get('/sign-in', 'UserController@signIn')
		->name('site.user.signIn');
	Route::post('/sign-in', 'UserController@signInPost')
		->name('site.user.signInPost');
	Route::get('/sign-out', 'UserController@signOut')
		->name('site.user.signOut');
});
