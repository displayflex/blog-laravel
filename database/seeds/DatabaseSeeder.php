<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(SectionsTableSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(ProfilesTableSeeder::class);
		$this->call(PostsTableSeeder::class);
		$this->call(TagsTableSeeder::class);
		$this->call(PostTagTableSeeder::class);
		$this->call(RolesTableSeeder::class);
		$this->call(PermissionsTableSeeder::class);
		$this->call(PermissionRoleTableSeeder::class);
		$this->call(RoleUserTableSeeder::class);
	}
}
