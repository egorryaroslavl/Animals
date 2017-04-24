<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Http\Requests;
	use Intervention\Image\Image;
	use Intervention\Image\ImageManager;


	class ImageController extends Controller
	{


		function __construct()
		{

			$this->image_max_width    = config( 'admin.settings.image_max_width' );
			$this->image_max_height   = config( 'admin.settings.image_max_height' );
			$this->icon_width         = config( 'admin.settings.icon_width' );
			$this->icon_height        = config( 'admin.settings.icon_height' );
			$this->thumbnail_s        = config( 'admin.settings.thumbnail_s' );
			$this->thumbnail_m        = config( 'admin.settings.thumbnail_m' );
			$this->thumbnail_l        = config( 'admin.settings.thumbnail_l' );
			$this->image_path_to_save = config( 'admin.settings.image_path_to_save' );
			$this->image_tmp_to_save  = config( 'admin.settings.image_tmp_to_save' );

		}

		public function save( Request $request )
		{
			if( $request->hasFile( 'photo' ) ){

				$file = $request->file( 'photo' );
				$ext  = $file->clientExtension();


				$path_to_save = config( 'admin.settings.image_tmp_to_save' );

				if( isset( $request->id ) && intval( $request->id ) > 0 ){

					$path_to_save = config( 'admin.settings.image_path_to_save' );
				}

				// массив префиксов превью
				$thumb_prefixes = config( 'admin.settings.thumbnail_prefix' );

				// префикс маленькой превью
				$thumb_small_prefix = config( 'admin.settings.thumbnail_prefix.small' );

				// префикс средней превью
				$thumb_middle_prefix = config( 'admin.settings.thumbnail_prefix.middle' );

				// префикс большой превью
				$thumb_large_prefix = config( 'admin.settings.thumbnail_prefix.large' );

				// максимальная ширина
				$max_w = config( 'admin.settings.image_max_width' );

				// максимальная  высота
				$max_h = config( 'admin.settings.image_max_height' );

				// ширина маленького превью
				$thumb_s_w = config( 'admin.settings.thumbnail_s.w' );

				// высота маленького превью
				$thumb_s_h = config( 'admin.settings.thumbnail_s.h' );


				// ширина среднего превью
				$thumb_m_w = config( 'admin.settings.thumbnail_m.w' );

				// высота среднего превью
				$thumb_m_h = config( 'admin.settings.thumbnail_m.h' );


				// ширина большого превью
				$thumb_l_w = config( 'admin.settings.thumbnail_l.w' );

				// высота большого превью
				$thumb_l_h = config( 'admin.settings.thumbnail_l.h' );


				$str_rand = strtolower( str_random( 6 ) );

				// новое имя файла
				$new_name = 'img_' . $request->table . '_' . $str_rand . '.' . $ext;

				// имя маленького превью
				$thumb_s_name = $thumb_small_prefix . $new_name;

				// имя среднего превью
				$thumb_m_name = $thumb_middle_prefix . $new_name;

				// имя большого превью
				$thumb_l_name = $thumb_large_prefix . $new_name;


				// имя и путь основного изображения
				$new_image_name = $path_to_save . $new_name;

				// имя и путь маленького превью
				$thumb_s = $path_to_save . $thumb_s_name;

				// имя и путь среднего превью
				$thumb_m = $path_to_save . $thumb_m_name;

				// имя и путь большого превью
				$thumb_l = $path_to_save . $thumb_l_name;


				$image = \Image::make( $request->file( 'photo' ) )->save( $new_image_name );


				/* изображение приводим к разумным размерам */
				$img = \Image::make( $request->file( 'photo' ) )
					->resize( null, $max_h, function ( $constraint ){
						$constraint->aspectRatio();
						$constraint->upsize();
					} )
					->resize( $max_w, null, function ( $constraint ){
						$constraint->aspectRatio();
						$constraint->upsize();
					} )->save( $new_image_name );


				/* создаём маленькое превью */
				$img_small_thumbnail = \Image::make( $request->file( 'photo' ) )
					->fit( $thumb_s_w, $thumb_s_h )
					->save( $thumb_s );


				/* создаём среднее превью */
				$img_middle_thumbnail = \Image::make( $request->file( 'photo' ) )
					->fit( $thumb_m_w, $thumb_m_h )
					->save( $thumb_m );


				/* создаём большое превью */
				$img_large_thumbnail = \Image::make( $request->file( 'photo' ) )
					->fit( $thumb_l_w, $thumb_l_h )
					->save( $thumb_l );


				$_img = \Image::make( $new_image_name );

				$size = $_img->filesize();


				/* если всё удачно - рапортуем */
				if( $img_small_thumbnail && $img_middle_thumbnail && $img_large_thumbnail ){
					echo json_encode( [
						'error'            => 'ok',
						'message'          => $new_name,
						'size'             => UtilsController::formatBytes( $size ),
						'table'            => $request->table,
						'id'               => $request->id,
						'image'            => $new_image_name,
						'thumbnail_large'  => $thumb_l,
						'thumbnail_middle' => $thumb_m,
						'thumbnail_small'  => $thumb_s,
						'rand_id'          => $str_rand
					] );
				}


				//dd($name  );

			}

		}


		public function iconSave( Request $request )
		{
			if( $request->hasFile( 'photo' ) ){

				$file = $request->file( 'photo' );
				$ext  = $file->clientExtension();


				$path_to_save = config( 'admin.settings.avatar_path_to_save' );


				// массив префиксов превью
				$thumb_prefixes = config( 'admin.settings.thumbnail_prefix' );

				// префикс маленькой превью
				$thumb_small_prefix = config( 'admin.settings.thumbnail_prefix.small' );

				// префикс средней превью
				$thumb_middle_prefix = config( 'admin.settings.thumbnail_prefix.middle' );

				// префикс большой превью
				$thumb_large_prefix = config( 'admin.settings.thumbnail_prefix.large' );

				// максимальная ширина
				$max_w = config( 'admin.settings.avatar_max_width' );

				// максимальная  высота
				$max_h = config( 'admin.settings.avatar_max_height' );

				// ширина маленького превью
				$thumb_s_w = config( 'admin.settings.avatar_thumbnail_s.w' );

				// высота маленького превью
				$thumb_s_h = config( 'admin.settings.avatar_thumbnail_s.h' );

				// ширина большого превью
				$thumb_l_w = config( 'admin.settings.avatar_thumbnail_l.w' );

				// высота большого превью
				$thumb_l_h = config( 'admin.settings.avatar_thumbnail_l.h' );


				// новое имя файла
				$new_name = 'icon_' . $request->table . '_' . $request->id . '.' . $ext;

				// имя маленького превью
				$thumb_s_name = $thumb_small_prefix . $new_name;


				// имя большого превью
				$thumb_l_name = $thumb_large_prefix . $new_name;


				// имя и путь основного изображения
				$new_image_name = $path_to_save . $new_name;

				// имя и путь маленького превью
				$thumb_s = $path_to_save . $thumb_s_name;


				// имя и путь большого превью
				$thumb_l = $path_to_save . $thumb_l_name;


				$image = \Image::make( $request->file( 'photo' ) )->save( $new_image_name );


				/* изображение приводим к разумным размерам */
				$img = \Image::make( $request->file( 'photo' ) )
					->resize( null, $max_h, function ( $constraint ){
						$constraint->aspectRatio();
						$constraint->upsize();
					} )
					->resize( $max_w, null, function ( $constraint ){
						$constraint->aspectRatio();
						$constraint->upsize();
					} )->save( $new_image_name );


				/* создаём маленькое превью */
				$img_small_thumbnail = \Image::make( $request->file( 'photo' ) )
					->fit( $thumb_s_w, $thumb_s_h )
					->save( $thumb_s );


				/* создаём большое превью */
				$img_large_thumbnail = \Image::make( $request->file( 'photo' ) )
					->fit( $thumb_l_w, $thumb_l_h )
					->save( $thumb_l );


				$_img = \Image::make( $new_image_name );

				$size = $_img->filesize();


				/* если всё удачно - рапортуем */
				if( $img_small_thumbnail && $img_large_thumbnail ){
					echo json_encode( [
						'error'           => 'ok',
						'message'         => $new_name,
						'size'            => UtilsController::formatBytes( $size ),
						'table'           => $request->table,
						'id'              => $request->id,
						'image'           => $new_image_name,
						'thumbnail_large' => $thumb_l,
						'thumbnail_small' => $thumb_s,

					] );
				}


				//dd($name  );

			}

		}

		public function resizeImage()
		{
			return view( 'resizeImage' );
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function resizeImagePost( Request $request )
		{
			$this->validate( $request, [
				/*'title' => 'required',*/
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			] );

			$image                = $request->file( 'image' );
			$input[ 'imagename' ] = 'icon_' . $_POST[ 'table' ] . "_" . $_POST[ 'id' ] . '.' . $image->getClientOriginalExtension();


			$destinationPath = public_path( 'icons' );
			$img             = \Image::make( $image->getRealPath() );
			$img->resize( 100, 100, function ( $constraint ){
				$constraint->aspectRatio();
			} )->save( $destinationPath . '/' . $input[ 'imagename' ] );

			$destinationPath = public_path( 'icons' );
			$image->move( $destinationPath, $input[ 'imagename' ] );


			return back()
				->with( 'success', 'Image Upload successful' )
				->with( 'imageName', $input[ 'imagename' ] );
		}

		public static function thumbnail_small( $file )
		{
			$thumb_prefix    = config( 'admin.settings.thumbnail_prefix.small' );
			$base_name       = basename( $file );
			$thumb_base_name = $thumb_prefix . $base_name;
			return str_replace( $base_name, $thumb_base_name, $file );
		}

		public static function thumbnail_middle( $file )
		{
			$thumb_prefix    = config( 'admin.settings.thumbnail_prefix.middle' );
			$base_name       = basename( $file );
			$thumb_base_name = $thumb_prefix . $base_name;
			return str_replace( $base_name, $thumb_base_name, $file );
		}

		public static function thumbnail_large( $file )
		{
			$thumb_prefix    = config( 'admin.settings.thumbnail_prefix.large' );
			$base_name       = basename( $file );
			$thumb_base_name = $thumb_prefix . $base_name;
			return str_replace( $base_name, $thumb_base_name, $file );
		}


	}
