<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class RoleUserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		/**
		 * admin
		 */
		User::find(1)->roles()->attach([1]);
		User::find(1)->roles()->attach([2]);
		User::find(1)->roles()->attach([3]);

		/**
		 * editor
		 */
		User::find(2)->roles()->attach([2]);
		User::find(2)->roles()->attach([3]);

		/**
		 * user
		 */
		User::find(3)->roles()->attach([3]);


		for ($i = 4; $i <= 10; $i++) {
			User::find($i)->roles()->attach([2]);
			User::find($i)->roles()->attach([3]);
		}
	}
}
