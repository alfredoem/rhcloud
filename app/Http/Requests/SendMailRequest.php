<?php namespace Course\Http\Requests;


use Course\Http\Requests\Request;

class SendMailRequest extends Request {

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'email' => 'required',
			'subject' => 'required',
			'message_body' => 'required'
		];
	}
} 