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

Route::group(['prefix' => 'post'], function () {
	Route::get('/{id}', 'PostController@post')
		->where('id', '[0-9]+')
		->name('site.post.post');
	Route::get('/add', 'PostController@add')
		->name('site.post.add');
	Route::post('/add', 'PostController@addPost')
		->name('site.post.addPost');
	Route::get('/edit/{id}', 'PostController@edit')
		->where('id', '[0-9]+')
		->name('site.post.edit');
	Route::post('/edit/{id}', 'PostController@editPost')
		->where('id', '[0-9]+')
		->name('site.post.editPost');
	Route::get('/delete/{id}', 'PostController@delete')
		->where('id', '[0-9]+')
		->name('site.post.delete');
});

Route::group(['prefix' => 'user'], function () {
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
	Route::get('/{id}', 'UserController@profile')
		->where('id', '[0-9]+')
		->name('site.user.profile');
	Route::get('/{id}/edit', 'UserController@edit')
		->where('id', '[0-9]+')
		->name('site.user.edit');
	Route::post('/{id}/edit', 'UserController@editPost')
		->where('id', '[0-9]+')
		->name('site.user.editPost');
});
