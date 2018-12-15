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

Route::get('/', 'MainController@index')
	->name('site.main.index');

Route::group(['prefix' => 'post'], function () {
	Route::get('/{id}', 'PostController@post')
		->where('id', '[0-9]+')
		->name('site.post.post');
	Route::get('/add', 'PostController@add')
		->name('site.post.add')
		->middleware('can:create,App\Models\Post');
	Route::post('/add', 'PostController@addPost')
		->name('site.post.addPost')
		->middleware('can:create,App\Models\Post');
	Route::get('/edit/{id}', 'PostController@edit')
		->where('id', '[0-9]+')
		->name('site.post.edit')
		->middleware('can:update,App\Models\Post');
	Route::post('/edit/{id}', 'PostController@editPost')
		->where('id', '[0-9]+')
		->name('site.post.editPost')
		->middleware('can:update,App\Models\Post');
	Route::get('/delete/{id}', 'PostController@delete')
		->where('id', '[0-9]+')
		->name('site.post.delete')
		->middleware('can:delete,App\Models\Post');
	Route::get('/tag/{id}', 'PostController@tag')
		->where('id', '[0-9]+')
		->name('site.post.tag');
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
		->name('site.user.profile')
		->middleware('can:view,App\Models\Profile');
	Route::get('/{id}/edit', 'UserController@edit')
		->where('id', '[0-9]+')
		->name('site.user.edit')
		->middleware('can:update,App\Models\Profile');
	Route::post('/{id}/edit', 'UserController@editPost')
		->where('id', '[0-9]+')
		->name('site.user.editPost')
		->middleware('can:update,App\Models\Profile');
});

// Route::get('/feedback', 'MainController@feedback')
// 	->name('site.main.feedback')
// 	->middleware('can:view,App\Models\Feedback');
// Route::post('/feedback', 'MainController@feedbackPost')
// 	->name('site.main.feedbackPost')
// 	->middleware('can:view,App\Models\Feedback');

Route::match(['get', 'post'], '/feedback', 'MainController@feedback')
	->name('site.main.feedback')
	->middleware('can:view,App\Models\Feedback');
