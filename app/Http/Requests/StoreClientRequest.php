<?php namespace Course\Http\Requests;

use Course\Http\Requests\Request;

class StoreClientRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'full_name' => 'required',
			'address'	=> 'required',
			'email'		=> 'required|email|unique:clients',
			'phone_number' => 'required',
			'type' 		=> 'required|in:empresa,particular',
			'register'	=> 'required_if:type,empresa'
		];
	}

}
