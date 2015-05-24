<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {

	public function run()
	{

		\DB::table('users')->insert([
			'first_name'  => 'Alfredo',
			'last_name'  => 'EM',
			'email' => 'espiritumalfredo@gmail.com',
			'password' => \Hash::make('thelove20++++'),
			'type' => 'admin',
			'full_name' => 'Alfredo EM'
		]);

		\DB::table('user_profiles')->insert([
			'user_id' => 1,
			'birthdate' => '1993/06/14'
		]);
	}

}