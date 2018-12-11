<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Permission::create([
			'name' => 'can_create_post'
		]);

		Permission::create([
			'name' => 'can_update_own_post'
		]);

		Permission::create([
			'name' => 'can_delete_own_post'
		]);

		Permission::create([
			'name' => 'can_update_own_profile'
		]);

		Permission::create([
			'name' => 'can_update_all_posts'
		]);

		Permission::create([
			'name' => 'can_delete_all_posts'
		]);

		Permission::create([
			'name' => 'can_update_all_profiles'
		]);

		Permission::create([
			'name' => 'can_view_all_profiles'
		]);
	}
}
