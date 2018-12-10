<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker\Factory::create('ru_RU');

		User::create([
			'login' => 'john',
			'email' => 'john@gmail.com',
			'password' => bcrypt('212180')
		]);

		User::create([
			'login' => 'doe',
			'email' => 'doe@gmail.com',
			'password' => bcrypt('212180')
		]);

		echo 'john: 212180' . "\n";
		echo 'doe: 212180' . "\n";

		for ($i = 1; $i < 9; $i++) {
			$login = $faker->userName();
			$password = str_random(10);

			User::create([
				'login' => $login,
				'email' => $faker->email(),
				'password' => bcrypt($password)
			]);


			echo $login . ': ' . $password . "\n";
		}
	}
}
