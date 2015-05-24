<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	/*'mailgun' => [
		'domain' => env('MAILGUN_DOMAIN'),
		'secret' => env('MAILGUN_PASS'),
	],*/

	'mailgun' => [
		'domain' => 'sandbox2d6ee316808141c2bb1b7f66d0c13a40.mailgun.org',
		'secret' => 'key-cc010a4b4d2242bb21712123575a3b08',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],

];
