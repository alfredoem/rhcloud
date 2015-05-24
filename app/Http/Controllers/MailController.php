<?php namespace Course\Http\Controllers;

use Course\Http\Requests;
use Course\Http\Controllers\Controller;

use Course\Http\Requests\SendMailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('contact.form');
	}

	public function send(SendMailRequest $request)
	{	
		$data = $request->all();

		\Mail::send('emails.welcome', $data, function($message) use ($request)
		{
			// from
			$message->from($request->email, $request->name);

			// subject
			$message->subject($request->subject);

			// to
			$message->to(env('CONTACT_MAIL'), env('CONTACT_ME'));

		});

		return view('emails.success');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
