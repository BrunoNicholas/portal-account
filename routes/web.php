<?php

/*
|--------------------------------------------------------------------------
| Web Routes for the application
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('index')->with('info','Welcome back!');
});

Route::get('test', function(){
	return view('layouts.site');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

// redirecting GitHub Auth2 routes
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');



Route::group(['prefix' => 'admin', 'middleware' => ['auth','verified','role:super-admin|admin']], function(){
		Route::resource('/roles', 'RoleController');
		Route::resource('/permissions', 'PermissionController');
		/*
		 * closure pages
		 */
		Route::get('/', [
			'as' 	=> 'admin',
			'uses'	=> 'AdminPageController@index',
		]);
	}
);

Route::group(['prefix'	=> 'admin', 'middleware'	=> ['auth','verified']], function()
	{
		Route::resource('/users', 'UserController');
	}
);

Route::get('/user', [
	'as' 	=> 'userhome',
	'uses'	=> 'HomeController@userIndex'
]);

Route::group(['prefix' => 'home', 'middleware' => ['auth','verified']], function(){
	Route::resource('{type}/messages', 'MessageController');
	Route::resource('salons', 'SalonController');
	Route::resource('shops', 'ShopController');
	Route::resource('sections/jobs', 'JobApplicationController');
	Route::resource('sections/questions', 'QuestionController');
	Route::resource('sections/posts', 'PostController');
	Route::resource('{type}/{id}/orders', 'OrderController');
	Route::resource('{type}/{id}/bookings', 'BookingController');
	Route::resource('{type}/{id}/comments', 'CommentController');
	Route::resource('{type}/{id}/reviews', 'ReviewController');
	Route::resource('{type}/{id}/ratings', 'RatingController');
	Route::resource('{type}/{id}/styles', 'StyleController');

	Route::resource('points', 'PointController');
	Route::resource('teams', 'TeamController');
	Route::resource('companies', 'CompanyController');
	Route::resource('categories', 'CategoriesController');
	Route::resource('sections/feedback', 'FeedbackController');
	Route::resource('user/gallery/images', 'ImageController');
	Route::resource('user/galleries', 'GalleryController');

	// closures
	Route::post('/{type}/message', [
		'as'	=> 'messages.storeAll',
		'uses'	=> 'MessageController@storeAll'
	]);
	
	Route::get('/user/profile/settings', [
		'as' 	=> 'settings',
		'uses'	=> 'UserPageController@settings',
	]);
	Route::get('/user/profile', [
		'as' 	=> 'profile',
		'uses'	=> 'UserPageController@profile',
	]);
	Route::get('/user/profile/timeline', [
		'as' 	=> 'settings',
		'uses'	=> 'UserPageController@settings',
	]);
	Route::post('/user/profile', [
		'as'	=> 'profile.update',
		'uses'	=> 'UserPageController@update_image'
	]);
	Route::post('/user/password/profile', [
		'as'	=> 'password.update',
		'uses'	=> 'UserController@changePassword'
	]);
});