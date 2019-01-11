<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker\Factory::create('ru_RU');

		for ($i = 0; $i < 15; $i++) {
			Post::create([
				'title' => $faker->realText(50),
				'content' => $faker->realText(1024),
				'user_id' => mt_rand(1, 10),
				'image' => $faker->imageUrl(180,167),
				'views_count' => mt_rand(0,100)
			]);
		}
	}
}
