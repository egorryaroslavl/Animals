<?php

	namespace App\Http\Controllers\Admin;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Sentinel;
	use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
	use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
	use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;


	class LoginController extends Controller
	{
		public function login()
		{
			return view( 'admin.login' );
		}

		public function postLogin( Request $request )
		{

			try{

				if( Sentinel::authenticate( $request->all() ) ){
					$slug = Sentinel::getUser()->roles()->first()->slug;

					if( $slug == 'admin' ){
						return redirect( '/admin' );
					} elseif( $slug == 'user' ){
						return redirect( '/user' );
					}
				}  else{

					return redirect()
						->back()
						->with( [ 'error' => 'Ошибка авторизации!' ] );

				}

			} catch( NotActivatedException $e ){

				return redirect()->back()->with( [ 'error' => 'Аккаунт ещё не активирован!' ] );

			} catch( ThrottlingException $e ){

				$delay = $e->getDelay();
				return redirect()->back()->with( [ 'error' => "Слишком много неудачных попыток авторизации! Вы забанены на $delay секунд!" ] );

			}


			//return Sentinel::check();
			return redirect()->intended();
		}

		public function logout()
		{
			Sentinel::logout();
			return redirect( '/' );
		}

	}
