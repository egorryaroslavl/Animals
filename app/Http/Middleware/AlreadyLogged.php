<?php

	namespace App\Http\Middleware;

	use Closure;
	use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

	class AlreadyLogged
	{


		public function handle()
		{
			if( Sentinel::getUser() ){
				return redirect( '/user' );
			}

		}
	}
