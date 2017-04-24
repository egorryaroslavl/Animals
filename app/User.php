<?php

	namespace App;

	use Illuminate\Notifications\Notifiable;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Cartalyst\Sentinel\Roles\EloquentRole;

	class User extends Authenticatable
	{
		use Notifiable;


		protected $fillable = [
			'name', 'email', 'password',
		];


		protected $hidden = [
			'password', 'remember_token',
		];

		public function profile()
		{
			return $this->hasOne( Profile::class );
			//return $this->hasOne( 'App\Profile' );

		}



		public static function whereId( $id )
		{

			return User::where( 'id', $id )->first();

		}

		public function roles()
		{
			return $this->belongsToMany( Role::class, 'role_users', null, 'role_id' );
		}

		public static function getRoles( $id )
		{

			$sql = "
SELECT * 
FROM `roles` 
WHERE `id` IN 
( 
SELECT `role_id` 
FROM `role_users` 
WHERE `user_id`= :id ) 
ORDER BY `slug` ASC
			";

			return \DB::select( $sql, [ 'id' => $id ] );
		}

	}
