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
	Route::get('/add', 'PostController@create')
		->name('site.post.create')
		->middleware('can:create,App\Models\Post');
	Route::post('/add', 'PostController@store')
		->name('site.post.store')
		->middleware('can:create,App\Models\Post');
	Route::get('/edit/{slug}', 'PostController@edit')
		->name('site.post.edit')
		->middleware('can:update,App\Models\Post');
	Route::patch('/edit/{slug}', 'PostController@update')
		->name('site.post.update')
		->middleware('can:update,App\Models\Post');
	Route::get('/delete/{slug}', 'PostController@destroy')
		->name('site.post.destroy')
		->middleware('can:destroy,App\Models\Post');
	Route::get('/{slug}', 'PostController@show')
		->name('site.post.show');
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
	Route::post('/{id}/edit', 'UserController@update')
		->where('id', '[0-9]+')
		->name('site.user.update')
		->middleware('can:update,App\Models\Profile');
});

Route::group(['prefix' => 'tag'], function () {
	Route::get('/all', 'TagController@index')
		->name('site.tag.index');
	Route::get('/{slug}', 'TagController@show')
		->name('site.tag.show');
});

Route::group(['prefix' => 'section'], function () {
	Route::get('/all', 'SectionController@index')
		->name('site.section.index');
	Route::get('/{slug}', 'SectionController@section')
		->name('site.section.show');
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
