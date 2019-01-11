<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTagTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		for ($i = 1; $i <= 15; $i++) {
			for ($j = 1; $j < mt_rand(2, 6); $j++) {
				Post::find($i)->tags()->attach([mt_rand(1, 20)]);
			}
		}
	}
}
