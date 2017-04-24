<?php

	namespace App\Http\Controllers;

	/*	use App\Model\Service;*/
	use Illuminate\Http\Request;
	use Mail;
	use DB;
	use PDO;
	use App\Http\Requests;

	class UtilsController extends Controller
	{


		public function reorder( Request $request )
		{


			if( isset( $request->sort_data ) ){

				$id        = array();
				$table     = $request->table;
				$sort_data = $request->sort_data;

				parse_str( $sort_data );

				$count = count( $id );
				for( $i = 0; $i < $count; $i++ ){


					DB::update( 'UPDATE `' . $table . '` SET `pos`=' . $i . ' WHERE `id`=? ', [ $id[ $i ] ] );

				}

			}
		}

		public static function Pre( $Arr )
		{
			echo '<span style="font-size:1.5em;color:#008800;">Items - ' . count( $Arr ) . '</span>
			<pre style="font-size:1.5em;">';
			print_r( $Arr );
			echo '</pre>';
		}


		public function translite( Request $request )
		{

			$alias_tranlited = self::translite_( $request->alias_source );

			echo json_encode( array( 'alias' => $alias_tranlited ) );
		}


		public function translite_( $string )
		{

			$dictionary = array(
				"А" => "a",
				"Б" => "b",
				"В" => "v",
				"Г" => "g",
				"Д" => "d",
				"Е" => "e",
				"Ж" => "zh",
				"З" => "z",
				"И" => "i",
				"Й" => "y",
				"К" => "K",
				"Л" => "l",
				"М" => "m",
				"Н" => "n",
				"О" => "o",
				"П" => "p",
				"Р" => "r",
				"С" => "s",
				"Т" => "t",
				"У" => "u",
				"Ф" => "f",
				"Х" => "h",
				"Ц" => "ts",
				"Ч" => "ch",
				"Ш" => "sh",
				"Щ" => "sch",
				"Ъ" => "",
				"Ы" => "yi",
				"Ь" => "",
				"Э" => "e",
				"Ю" => "yu",
				"Я" => "ya",
				"а" => "a",
				"б" => "b",
				"в" => "v",
				"г" => "g",
				"д" => "d",
				"е" => "e",
				"ж" => "zh",
				"з" => "z",
				"и" => "i",
				"й" => "y",
				"к" => "k",
				"л" => "l",
				"м" => "m",
				"н" => "n",
				"о" => "o",
				"п" => "p",
				"р" => "r",
				"с" => "s",
				"т" => "t",
				"у" => "u",
				"ф" => "f",
				"х" => "h",
				"ц" => "ts",
				"ч" => "ch",
				"ш" => "sh",
				"щ" => "sch",
				"ъ" => "y",
				"ы" => "y",
				"ь" => "",
				"э" => "e",
				"ю" => "yu",
				"я" => "ya",
				"-" => "_",
				" " => "_",
				"," => "_",
				"." => "_",
				"?" => "",
				"!" => "",
				"«" => "",
				"»" => "",
				":" => "",
				'ё' => "e",
				'Ё' => "e",
				"*" => "",
				"(" => "",
				")" => "",
				"[" => "",
				"]" => "",
				"<" => "",
				">" => ""
			);
			$string     = preg_replace( '/[^\w\s]/u', ' ', $string );
			$string     = mb_strtolower( strtr( strip_tags( trim( $string ) ), $dictionary ) );
			return preg_replace( '/[_]+/', '_', $string );
		}


		function orderForm( Request $request )
		{

			$service_id = $request->service_id;

			$data = Service::find( $service_id );

			if( $service_id == '' || $service_id == 0 ){
				$data = '';
			}

			return view( 'order_form', [ 'data' => $data ] );


		}

		public function sendmail( Request $request )
		{

			$data = array(
				'name'    => $request->name,
				'phone'   => $request->phone,
				'email'   => $request->email,
				'message' => $request->message,
			);

			Mail::send( 'emails.usermsg', [ 'data' => $data ], function ( $message ){
				$message->to( 'yaroslavl.city@gmail.com', 'Админу сайта' )->subject( 'Сообщение с сайта' );
			} );

		}

		public static function defaultMeta( $data, $defaultMeta )
		{

			if( !isset( $defaultMeta ) || !is_array( $defaultMeta ) || count( $defaultMeta ) == 0 ){
				$defaultMeta = array(
					'title'       => 'ООО ',
					'description' => 'ООО ',
					'keywords'    => 'ООО ' );
			}

			if( !isset( $data->metatag_title ) && empty( $data->metatag_title ) ){
				$data->metatag_title = $defaultMeta[ 'title' ];
			}
			if( !isset( $data->metatag_description ) || empty( $data->metatag_description ) ){
				$data->metatag_description = $defaultMeta[ 'description' ];
			}

			if( !isset( $data->metatag_keywords ) || empty( $data->metatag_keywords ) ){
				$data->metatag_keywords = $defaultMeta[ 'keywords' ];
			}

		}


		public static function itemActive( $path, $request )
		{

			if( $request == $path ){
				echo ' current-menu-item ';
			}

		}

		public static function ac( $thisUrl, $more = false )
		{

			$add = $more ? ' ' . $more : '';

			if( $thisUrl == $_SERVER[ "REQUEST_URI" ] ){
				echo ' class="active' . $add . '"';
			} else{
				if( $more ){
					echo ' class="' . trim( $add ) . '"';
				}

			}

			$explRes = explode( "/", $_SERVER[ "REQUEST_URI" ] );
			$u       = $explRes[ 1 ];
			if( preg_match( "/$u/i", $thisUrl ) && $_SERVER[ "REQUEST_URI" ] !== "/" ){
				echo ' class="active' . $add . '"';
			}

		}


		function reverseValue( Request $request )
		{
			$error = 'error';
			if( isset( $request->table ) ){

				$value = $request->value;
				$table = $request->table;
				$id    = $request->id;
				//UPDATE users SET `authorised` = IF (`authorised`, 0, 1)
				$res = DB::update( 'UPDATE `' . $table . '` SET `public` = IF (`public`, 0, 1) WHERE `id`=? ', [ $id ] );


				if( $res > 0 ){
					$error = 'ok';
					$nv    = DB::select( 'SELECT `public` FROM  `' . $table . '` WHERE `id`=? ', [ $id ] );
					$name  = $nv->fetchColumn( PDO::FETCH_OBJ );
					dd( $name->public );
					echo json_encode( [ 'error' => $error, 'messsage' => $name->public ] );
				}

			}

		}

		public static function formatBytes( $size, $precision = 2 )
		{
			if( $size > 0 ){
				$size     = (int)$size;
				$base     = log( $size ) / log( 1024 );
				$suffixes = array( ' bytes', ' Kb', ' Mb', ' Gb', ' Tb' );

				return round( pow( 1024, $base - floor( $base ) ), $precision ) . $suffixes[ floor( $base ) ];
			} else{
				return $size;
			}
		}


		function GeocodingJsonParse( Request $request )
		{

			if( isset( $request->geocoding_json ) && !empty( $request->geocoding_json ) ){

				$data = json_decode( $request->geocoding_json );
				$res  = [];


				$Count = count( $data );


				if( $Count > 0 ){


					foreach( $data as $item ){


						$typesCount  = count( $item->address_components[ 0 ]->types );
						$typesValues = array_values( $item->address_components[ 0 ]->types );
						if( $typesCount == 3
							&& in_array( 'political', $typesValues )
							&& in_array( 'sublocality', $typesValues )
							&& in_array( 'sublocality_level_2', $typesValues )
						){
							$res = $item->address_components[ 0 ]->long_name;
						}


					}

					echo json_encode( [ 'error' => 'ok', 'message' => $res ] );


				}

			}


		}


	}
