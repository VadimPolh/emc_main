<?php

/*
|--------------------------------------------------------------------------
| Authentication & Password Reset Controllers
|--------------------------------------------------------------------------
|
| These two controllers handle the authentication of the users of your
| application, as well as the functions necessary for resetting the
| passwords for your users. You may modify or remove these files.
|
*/

// Home
Route::get('/', [
	'uses' => 'HomeController@index', 
	'as' => 'home'
]);
Route::get('language', 'HomeController@language');


// Admin
Route::get('admin', [
	'uses' => 'AdminController@admin',
	'as' => 'admin',
	'middleware' => 'admin'
]);

Route::get('medias', [
	'uses' => 'AdminController@filemanager',
	'as' => 'medias',
	'middleware' => 'redac'
]);


// Blog
Route::get('blog/order', 'BlogController@indexOrder');
Route::get('articles', 'BlogController@indexFront');
Route::get('blog/tag', 'BlogController@tag');
Route::get('blog/search', 'BlogController@search');

Route::put('postseen/{id}', 'BlogController@updateSeen');
Route::put('postactive/{id}', 'BlogController@updateActive');

Route::resource('blog', 'BlogController');

// Comment
Route::resource('comment', 'CommentController', [
	'except' => ['create', 'show']
]);

Route::put('commentseen/{id}', 'CommentController@updateSeen');
Route::put('uservalid/{id}', 'CommentController@valid');


// Contact
Route::resource('contact', 'ContactController', [
	'except' => ['show', 'edit']
]);


// User
Route::get('user/sort/{role}', 'UserController@indexSort');
Route::get('user/roles', 'UserController@getRoles');
Route::post('user/roles', 'UserController@postRoles');

Route::put('userseen/{id}', 'UserController@updateSeen');

Route::resource('user', 'UserController');

//User api
Route::get('/api/user/info','UserController@getInfo');



//Specialty
Route::resource('specialty', 'SpecialtyController');
Route::get('/content/specialty','SpecialtyController@index');



Route::get('lection/{id}/edit/', 'LectionController@edit');

//Objects
Route::resource('objects','ObjectsController');
Route::get('{spec}/{group}/{slug}', 'ObjectsController@showMain');

//Topics
Route::get('topics','TopicsController@index');
Route::resource('api/topics','TopicsController');



//Lection
Route::resource('lection','LectionController');
Route::post('lection/upload','LectionController@upload');
Route::get('{spec}/{group}/{slug}/lection/{lection}', 'LectionController@showMain');
Route::post('search', 'LectionController@search');

//Practicals
Route::resource('practical','PracticalController');



//Groups
Route::resource('groups','GroupsController');


// Auth
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('/{specialty}','SpecialtyController@showSpecialty');