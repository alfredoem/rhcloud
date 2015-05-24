<?php namespace Course;


use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class Resource extends Model {

	public $table = "resources";

	protected $fillable = ['title', 'description', 'references', 'image'];


	public function getImg()
	{
		$faker = Faker::create();
		return $faker->imageUrl(100, 50, 'cats');
	}

	public function getDescription()
	{
		$faker = Faker::create();
		return $faker->paragraph(3);
	}

}