<?php namespace Course\Http\Requests;

use Course\Http\Requests\Request;
use Illuminate\Routing\Route;

class UpdateClientRequest extends Request {

	private $route;

	public function __construct(Route $route)
	{

		$this->route = $route;

	}
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
			'email'		=> 'required|email|unique:clients,email,' . $this->route->getParameter('clients'),
			'address'	=> 'required',
			'phone_number' => '',
			'type'		=> 'required|in:empresa,particular',
			'register'	=> 'required_if:type,empresa'
		];
	}

}
