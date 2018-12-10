<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker\Factory::create('ru_RU');

		for ($i = 0; $i < 20; $i++) {
			Tag::create([
				'name' => $faker->realText(15)
			]);
		}
	}
}
