<?php

Route::group(['middleware' => ['web']], function () {

	Route::get('/', [
		'uses' => 'WelcomeController@getIndex',
		'as' => 'welcome.index'
	]);

	Route::get('/shop', [
		'uses' => 'ProductController@getIndex',
		'as' => 'product.index'
	]);

	Route::get('/shopping-cart', [
		'uses' => 'ProductController@getCart',
		'as' => 'product.shoppingCart'
	]);
	
	Route::get('/add-to-cart/{id}', [
		'uses' => 'ProductController@getAddToCart',
		'as' => 'product.addToCart'
	]);

	Route::get('/reduce/{id}', [
		'uses' => 'ProductController@getReduceByOne',
		'as' => 'product.reduceByOne'
	]);

	Route::get('/remove/{id}', [
		'uses' => 'ProductController@getRemoveItem',
		'as' => 'product.removeItem'
	]);

	Route::get('/order', [
		'uses' => 'ProductController@getOrder',
		'as' => 'order',
		'middleware' => 'auth'
	]);

	Route::post('/order', [
		'uses' => 'ProductController@postOrder',
		'as' => 'order',
		'middleware' => 'auth'
	]);

	Route::get('/checkout', [
		'uses' => 'ProductController@getCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
	]);

	Route::post('/checkout', [
		'uses' => 'ProductController@postCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
	]);

	// Admin
	Route::get('/admin', [
		'uses' => 'AdminController@admin',
		'as' => 'admin',
		'middleware' => 'admin'
	]);
	
    Route::resource('products', 'AdminProductsController');
    Route::resource('categories', 'AdminCategoriesController');
    Route::resource('purcasher', 'AdminPurcasherController');
    Route::resource('contact', 'ContactController');
	Route::resource('user', 'UserController');
	// middleware guest
	Route::group(['middleware' => 'guest'], function(){
		Route::get('/register', [
			'uses' => 'UserController@getSignup',
			'as' => 'user.register'
		]);

		Route::post('/register', [
			'uses' => 'Auth\AuthController@postRegister',
			'as' => 'user.register'
		]);

		Route::get('/login', [
			'uses' => 'UserController@getSignin',
			'as' => 'user.login'
		]);
		// authentication login routes
		Route::post('/login', [ 
				'uses' =>'Auth\AuthController@postLogin',
				'as' => 'user.login'
		]);
		Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');

	});
	// middleware auth 
	Route::group(['middleware' => 'auth'], function(){
		// 
		Route::get('/profile', [
			'uses' => 'UserController@getProfile',
			'as' => 'user.profile'
		]);
		// authentication logout routes
		Route::get('/logout', [ 
				'uses' => 'UserController@getLogout',
				'as' => 'user.logout'
		]);

	});
});
