<?php

namespace Course\Http\Controllers;

use Course\User;

class UsersController extends Controller {

	/*
	 * Eloquent: objetos de modelo relacional
	 */
	public function index()
	{
		$users = User::select('id', 'first_name')
			->with('profile')
			->where('first_name', '<>', 'Alfredo')
			->orderBy('first_name', 'ASC')
			->get();

		dd($users->toArray());
	}


	/*
	 * Fluent: consructor de consultas
	 */
	/*public function index()
	{
		$result = \DB::table('users')
			->select(
				'users.*',
				'user_profiles.id as profile_id',
				'user_profiles.twitter',
				'user_profiles.birthdate'
			)
			->leftjoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
			->get();

		dd($result);
		
	}*/

}