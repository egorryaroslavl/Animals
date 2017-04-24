<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Kladr extends Model
	{
		protected $table = 'kladr';

		protected $primaryKey = null;

		public $incrementing = false;

		public static function keysToLower( $item )
		{
			return   array_change_key_case( (array)$item, CASE_LOWER );
		}

		public static function region()
		{
			return  	 \DB::select(
			'SELECT * FROM `kladr` WHERE `SOCR` IN (?,?) ORDER BY `NAME`', [ 'обл','край' ] );

		}
	}
