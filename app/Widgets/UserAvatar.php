<?php

	namespace App\Widgets;

	use App\Http\Controllers\ImageController;
	use App\User;
	use Arrilot\Widgets\AbstractWidget;

	use Illuminate\Http\Request;


	class UserAvatar extends AbstractWidget
	{


		/**
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function run()
		{
			$id   = \Sentinel::getUser()->getUserId();
			$data = User::whereId( $id );
			$fileName = ImageController::thumbnail_large( $data->profile()->first()->icon );
			$data->avatar = '/images/noavatar.png';

			if( !empty( $fileName ) && file_exists( public_path( '/icons/' .$fileName ) ) ){

				$data->avatar = '/icons/' . $fileName;
			}

			return view( "widgets.user_avatar", [
				'data' => $data
			] );
		}
	}

