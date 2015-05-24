<?php namespace Course\Core;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator as LaravelValidator;


class Validator extends LaravelValidator {

	public function ValidateCurrentPassword($attribute, $value, $parameters)
	{
		return Hash::check($value, Auth::user()->password);
	}

}