<?php namespace Course;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	protected $table = 'clients';

	/* Definimos los campos que se pueden
	 * llenar con asignacion masiva
	 */
	protected $fillable = [

		'full_name', 
		'email',
		'address', 
		'register',
		'phone_number', 
		'type'
	];




}
