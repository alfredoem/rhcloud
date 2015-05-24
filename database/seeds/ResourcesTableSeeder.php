<?php 


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ResourcesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($f = 0; $f < 20; $f++)
		{
			\DB::table('resources')->insert([
				'title' => $faker->domainWord,
				'description' => $faker->paragraph(2),
				'references' => $faker->url,
				'tags'	=> $faker->word,
				'image' => $faker->imageUrl(100,50,'cats')
			]);
		}
	}

}