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
			'login' => 'admin',
			'email' => 'admin@gmail.com',
			'password' => bcrypt('212180')
		]);

		User::create([
			'login' => 'editor',
			'email' => 'editor@gmail.com',
			'password' => bcrypt('212180')
		]);

		User::create([
			'login' => 'user',
			'email' => 'doe@gmail.com',
			'password' => bcrypt('212180')
		]);

		echo 'admin: 212180' . "\n";
		echo 'editor: 212180' . "\n";
		echo 'user: 212180' . "\n";

		for ($i = 1; $i < 8; $i++) {
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
