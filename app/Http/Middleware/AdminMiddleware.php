<?php

	namespace App\Http\Middleware;

	use Closure;
	use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
	use Illuminate\Support\Facades\Input;
	use Illuminate\Support\Facades\Redirect;

	class AdminMiddleware
	{
		/**
		 * Handle an incoming request.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  \Closure                 $next
		 *
		 * @return mixed
		 */
		public function handle( $request, Closure $next )
		{

			if( Sentinel::check()
				&& in_array( Sentinel::getUser()->roles()->first()->slug, [ 'admin', 'user' ] )
			){

				return $next( $request );
			}

			return redirect( 'login' );

		}
	}
