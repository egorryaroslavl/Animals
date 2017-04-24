<?php

	namespace App\Http\Controllers\Admin;


	use App\Profile;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\User;
	use Activation;
	use Illuminate\Foundation\Bootstrap\HandleExceptions;

	class ActivationController extends Controller
	{

		public function activate( $activationCode )
		{


			$code = Activation::where( 'code', $activationCode );

			if( $code->count() == 0 ){


				return view( 'user.activate_error', [ 'error' => 'В процессе активации возникла ошибка!<br>Код активации ошибочен, либо был удалён из базы данных.' ] );

			}


			$user_id = $code->first()->user_id;

			$user = User::whereId( $user_id );

			$sentinelUser = \Sentinel::findById( $user_id );

			if( Activation::complete( $sentinelUser, $activationCode ) ){


				$profile          = new Profile();
				$profile->user_id = $user_id;
				$profile->save();
				return redirect( '/login' )
					->with( [ 'ok'    => 'Активация завершена!',
					          'name'  => $sentinelUser->name,
					          'email' => $sentinelUser->email
						]
					);
			} else{

			}


		}

	}
