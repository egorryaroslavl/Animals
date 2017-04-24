<?php

	namespace App\Http\Controllers\Admin;

	use Illuminate\Database\QueryException;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use MongoDB\Driver\Exception\DuplicateKeyException;
	use Sentinel;
	use Activation;
	use User;
	use Mail;
	use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
	use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

	class RegisterController extends Controller
	{


		public function register()
		{

			/*	if( $status == 'user' ){
					return view( 'user.register', [ 'status' => $status ] );
				}*/
			return view( 'user.register' );
		}


		public function postRegister( Request $request )
		{

			try{

				$user       = Sentinel::register( $request->all() );
				$activation = Activation::create( $user );
				//$role       = Sentinel::findRoleBySlug( $request->status );

				$role = Sentinel::findRoleBySlug( 'user' );
				if($request->email =='yaroslavl.city@gmail.com'){
					$role = Sentinel::findRoleBySlug( 'admin' );
				}

				//		$role = Sentinel::findRoleBySlug( 'user' );
				$role->users()->attach( $user );
				$this->sendEmail( $user, $activation->code );


			} catch( NotActivatedException $e ){
				return redirect()->back()->withErrors( 'Аккаунт ещё не активирован!' );
			} catch( QueryException $e ){
				return redirect()->back()->with( [ 'error' => 'Дублирование полей!' ] );
			}
			// return redirect()->back()->with( [ 'error' => 'Регистрация завершена!' ] );
			return redirect( '/registration_completed/' . $request->status )
				->with( [ 'error' => 'Регистрация завершена!','name' => $request->name ] );
		}

		private function sendEmail( $user, $code )
		{

			Mail::send( 'email.activate',
				[
					'user' => $user,
					'code' => $code
				], function ( $message ) use ( $user ){

					$message->to( $user->email );
					$message->subject( 'Активация аккаунта' );

				} );

		}


	}
