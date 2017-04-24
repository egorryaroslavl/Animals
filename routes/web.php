<?php

	Route::get( '/', function (){
		// return view( 'main_petcare' );
		return view( 'main_epetcare' );
	} );

	Route::group( [ 'middleware' => 'visitors' ], function (){

		Route::get( '/user', 'User\UserController@index' );
		Route::get( '/user/profile', 'User\UserController@index' );
		Route::get( '/user/profile/edit', 'User\UserController@profileEdit' );
		Route::get( '/user/{category}', 'User\UserController@messages' )
			->where( 'category', '(poteryashki|naydenyshi|dobryye_ruki|weddings)' );


		/* images to server */
		Route::post( '/user/{category}/message_images', 'User\UserController@messageImages' )
			->where( 'category', '(poteryashki|naydenyshi|dobryye_ruki|weddings)' );


		Route::post( '/user/{category}/message_create', 'User\UserController@messageCreate' )
			->where( 'category', '(poteryashki|naydenyshi|dobryye_ruki|weddings)' );


		/*
				Route::get( '/user/profile', function (){
					$userId = Sentinel::getUser()->getUserId();
					$user   = \App\User::whereId( $userId );
					return view( 'user.form', [ 'data'=>$user ] ) ;

				} );*/

	} );

	//Route::get( '/register/{status}', 'Admin\RegisterController@register' );
	Route::get( '/register', 'Admin\RegisterController@register' );
	Route::post( '/register', 'Admin\RegisterController@postRegister' );


	Route::get( '/login', 'Admin\LoginController@login' );
	Route::post( '/login', 'Admin\LoginController@postLogin' );

	Route::post( '/logout', 'Admin\LoginController@logout' );
	Route::get( '/admin', function (){

		$status = Sentinel::getUser()->roles()->first()->slug;
		if( $status == 'admin' ){
			return view( 'admin.index', [ 'content' => "Не выбран раздел" ] );
		}
		if( $status == 'user' ){
			return view( 'admin.user' );
		}
	} )->middleware( 'admin' );


	Route::get( '/activate/{activationCode}', 'Admin\ActivationController@activate' );

	Route::get( '/admin/users', 'Admin\UsersController@index' );
	Route::get( '/admin/user/{id}', 'Admin\UsersController@edit' );
	Route::post( '/user/update', 'Admin\UsersController@update' );

	Route::get( '/resizeImage', 'ImageController@resizeImage' );
	//Route::post('/iconsave',['as'=>'iconsave','uses'=>'ImageController@iconsave']);
	Route::post( '/iconsave', 'ImageController@iconSave' );

	Route::get( '/registration_completed/{status}', function (){
		return view( 'user.after_register' );
	} );


	Route::post( '/google_geocoding_json_parse', 'UtilsController@GeocodingJsonParse' );





