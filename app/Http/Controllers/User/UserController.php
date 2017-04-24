<?php

	namespace App\Http\Controllers\User;

	use App\User;
	use Illuminate\Http\Request;
	use App\Http\Requests;
	use App\Http\Controllers\Controller;
	use Symfony\Component\DomCrawler\Form;

	class UserController extends User
	{

		public function index()
		{
			$userId = \Sentinel::getUser()->getUserId();
			$data   = User::whereId( $userId );

			return view( 'user.private.index' )->with( 'data', $data );

		}


		public function profileEdit()
		{
			$userId = \Sentinel::getUser()->getUserId();
			$data   = User::whereId( $userId );

			return view( 'user.private.profile_edit_form' )->with( 'data', $data );

		}

		public function messages( $category )
		{

			$data           = new User();
			$data->category = $category;

			return view( 'user.private.list' )->with( 'data', $data );

		}

		public function messageImages( Request $request )
		{
			//	$uploads_dir = 'uploads';


			if( $request->hasFile( 'photo' ) ){
				$uploads_dir = sys_get_temp_dir();
				$file        = $request->file( 'photo' );
				$ext         = $file->clientExtension();
				$fileName    = uniqid() . '.' . $ext;
				$filePath    = $uploads_dir . '/' . $fileName;

				\Image::make( $_FILES[ 'photo' ][ 'tmp_name' ] )
					->resize( null, 600, function ( $constraint ){
						$constraint->aspectRatio();
						$constraint->upsize();
					} )
					->resize( 800, null, function ( $constraint ){
						$constraint->aspectRatio();
						$constraint->upsize();
					} )->save( $filePath );


				echo json_encode( [
					'success'   => 'true',
					'realPath'  => $filePath,
					'extension' => $ext ] );
			}

		}


		public function messageCreate( Request $request )
		{


			dd( $request->all() );


		}


	}
