<?php

	namespace App\Http\Controllers\Admin;

	use App\User;
	use App\Profile;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;


	class UsersController extends Controller
	{

		public function index()
		{

			$users            = User::paginate( 30 );
		//	dd($users->first());
			$breadcrumbsArray = [
				'title' => 'Юзеры',
				'items' => [
					'/admin/users' => 'Юзеры',
				]
			];
/*			$breadcrumbs      = view( 'admin.common.breadcrumbs', [ 'breadcrumbs' => $breadcrumbsArray ] );
			view()->share( 'breadcrumbs', $breadcrumbs );*/


			return view( 'admin.users.index', [ 'data' => $users  ] );

		}


		public function edit( Request $request )
		{


			$data = User::where( 'id', $request->id )->first();

			 //	dd($data->roles()->first());
			$data->table = 'users';

			$breadcrumbsArray = [
				'title' => 'Юзеры',
				'items' => [
					'/admin/users'                 => 'Юзеры',
					'/admin/users/' . $request->id => $data->name,

				]
			];
			$breadcrumbs      = view( 'admin.common.breadcrumbs', [ 'breadcrumbs' => $breadcrumbsArray ] );
			view()->share( 'breadcrumbs', $breadcrumbs );


			return view( 'admin.users.form', [ 'data' => $data ] );
		}


		public function update( Request $request )
		{


		//	dd($request->all());

			$v = \Validator::make( $request->all(), [
				'name' => 'required|max:255',
			] );

			if( $v->fails() ){
				return redirect()->back()->withErrors( $v->errors() );
			}

			$user        = User::find( $request->id );
			$user->name  = $request->name;
			$user->email = $request->email;
			$profile     = $user->Profile ?: new Profile();
			/*$profile->name    = '';*/
			$profile->icon    = $request->icon;
			$profile->address = $request->address;
			$profile->phone   = $request->phone;
			$profile->skype   = $request->skype;
			$user->Profile()->save( $profile );

			$user->save();

			return back()->with( 'message', 'Запись обновлена!' );
		}


	}
