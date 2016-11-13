<?php

Route::get('/', array(

	'as' => 'home',
	'uses' => 'HomeController@home'
));

/*
/ Unauthenticated Group
*/
Route::group(array('before' => 'guest'), function() {

	/*
	/ CSRF protection group
	*/
	Route::group(array('before' => 'csrf'), function(){

		/*
		/ Create Account (POST)
		*/
		Route::post('/account/create', array(

			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

	});

	/*
	/ Create Account (GET)
	*/
	Route::get('/account/create', array(

		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));
});
