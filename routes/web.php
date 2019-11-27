<?php

/*
|--------------------------------------------------------------------------
| Web Routes for the application
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('home')->with('info','Welcome back!');
});

Route::get('test', function(){
	return view('index');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

// redirecting GitHub Auth2 routes
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');



Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:super-admin|admin']], function(){
		Route::resource('/roles', 'RoleController');
		/*
		 * closure pages
		 */
		Route::get('/', [
			'as' 	=> 'admin',
			'uses'	=> 'AdminPageController@index',
		]);
	}
);

Route::group(['prefix'	=> 'admin', 'middleware'	=> ['auth']], function()
	{
		Route::resource('/users', 'UserController');
	}
);

Route::get('/user', [
	'as' 	=> 'userhome',
	'uses'	=> 'HomeController@userIndex'
]);

