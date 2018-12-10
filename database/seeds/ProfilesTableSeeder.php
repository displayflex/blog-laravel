<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker\Factory::create('ru_RU');

		for ($i = 1; $i <= 10; $i++) {
			Profile::create([
				'user_id' => $i,
				'name' => $faker->firstName(),
				'surname' => $faker->lastName(),
				'birthdate' => $faker->dateTimeThisCentury(),
				'phone' => $faker->numberBetween(100000, 99999999999)
			]);
		}
	}
}
