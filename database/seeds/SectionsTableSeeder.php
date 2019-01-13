<?php

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker\Factory::create('ru_RU');

		for ($i = 0; $i < 10; $i++) {
			Section::create([
				'name' => $faker->realText(15)
			]);
		}
	}
}
