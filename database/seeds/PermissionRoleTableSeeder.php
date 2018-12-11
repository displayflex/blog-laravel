<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		/**
		 * Admin
		 */
		Role::find(1)->permissions()->attach([1]);
		Role::find(1)->permissions()->attach([2]);
		Role::find(1)->permissions()->attach([3]);
		Role::find(1)->permissions()->attach([4]);
		Role::find(1)->permissions()->attach([5]);
		Role::find(1)->permissions()->attach([6]);
		Role::find(1)->permissions()->attach([7]);
		Role::find(1)->permissions()->attach([8]);

		/**
		 * Editor
		 */
		Role::find(2)->permissions()->attach([1]);
		Role::find(2)->permissions()->attach([2]);
		Role::find(2)->permissions()->attach([3]);
		Role::find(2)->permissions()->attach([4]);
		Role::find(2)->permissions()->attach([8]);

		/**
		 * User
		 */
		Role::find(3)->permissions()->attach([8]);
	}
}
