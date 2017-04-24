<?php

	use Illuminate\Database\Seeder;

	class DatabaseSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			DB::table( 'roles' )->insert([
				[
					'name' => 'owner',
					'slug' => 'owner'
				],
				[
					'name' => 'admin',
					'slug' => 'admin'
				],
				[
					'name' => 'user',
					'slug' => 'user'
				]

			]);
		}
	}
