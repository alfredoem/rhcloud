<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i < 500; $i++) 
		{	

			$firstName = $faker->firstName;
			$lastName = $faker->lastName;

			$id = \DB::table('users')->insertGetId([
			'first_name'  => $firstName,
			'last_name'  => $lastName,
			'email' => $faker->unique->email,
			'password' => \Hash::make('123456'),
			'type' => 'user',
			'full_name' => "$firstName $lastName"
			]);


		\DB::table('user_profiles')->insert([
			'user_id' => $id,
			'bio' => $faker->paragraph(rand(2,5)),
			'twitter' => 'http://www.twitter.com/' . $faker->userName,
			'website' => 'http://www.' . $faker->domainName,
			'birthdate' => $faker->dateTimeBetween('-45 years', '-15years')->format('Y-m-d')
		]);

		}
		
	}

}