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

//Contact
Route::get('contact', function () { return view('contact'); })->name('contact');
Route::post('contact/mail', 'ContactController@contactMail')->name('contactMail');

//Articles
Route::get('/', ['as' => 'index', 'uses' => 'SiteController@index']);
Route::get('article{id}', 'SiteController@show')->name('articleShow');
Route::get('index/{categoryId}', 'SiteController@showByCategory')->name('articleByCategory');

//Comments
Route::get('comment/{id}', 'CommentController@show')->name('commentShow');
Route::post('article', 'CommentController@store')->name('commentStore');
Route::delete('delete/{comment}', 'CommentController@delete')->name('commentDelete');

// ======== AdminPanel =========================
Route::group(['prefix' => 'admin/article'], function () {

	Route::get('index', 'Admin\AdminArticleController@index')->name('adminIndex');
	Route::post('create', 'Admin\AdminArticleController@store')->name('articleStore');
	Route::get('create', 'Admin\AdminArticleController@create')->name('articleCreate');
	Route::get('update/{id}', 'Admin\AdminArticleController@update')->name('articleUpdate');
	Route::post('update', 'Admin\AdminArticleController@postUpdate')->name('articlePostUpdate');
	Route::delete('delete/{article}', 'Admin\AdminArticleController@delete')->name('articleDelete');
	Route::post('upload', 'Admin\AdminArticleController@uploadFile')->name('upload');
});

Route::group(['prefix' => 'admin/category'], function () {

	Route::get('index', 'Admin\AdminCategoryController@index')->name('categoryIndex');
	Route::post('create', 'Admin\AdminCategoryController@store')->name('categoryStore');
	Route::get('create', 'Admin\AdminCategoryController@create')->name('categoryCreate');
	Route::get('update/{id}', 'Admin\AdminCategoryController@update')->name('categoryUpdate');
	Route::get('delete/{article}', 'Admin\AdminCategoryController@delete')->name('categoryDelete');
});
// ======== END AdminPanel =======================

// ======== Authentication =======================
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// login
Route::get('loginX', 'Auth\LoginController@showLoginForm')->name('loginX');
Route::post('loginX', 'Auth\LoginController@login')->name('loginX');
Route::get('logoutX', 'Auth\LoginController@logout')->name('logoutX');

// register
Route::get('registerX', 'Auth\RegisterController@showRegistrationForm')->name('registerX');
Route::post('registerX', 'Auth\RegisterController@register')->name('registerX');
// ======== END Authentication =======================

