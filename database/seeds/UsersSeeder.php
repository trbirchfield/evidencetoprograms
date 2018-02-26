<?php

use App\Models\Candidate;
use App\Models\Plank;
use App\Models\Status;
use App\Models\User;
use App\Models\UserData;
use Bican\Roles\Models\Role;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {
	/**
	 * Seed the users table.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->truncate();
		DB::table('roles')->truncate();
		DB::table('permissions')->truncate();
		DB::table('role_user')->truncate();
		DB::table('permission_user')->truncate();
		DB::table('permission_role')->truncate();

		$role_superadmin = Role::create(['name' => 'Super Admin', 'slug' => 'superadmin']);
		$role_admin      = Role::create(['name' => 'Admin',       'slug' => 'admin']);

		$user = User::create([
			'fname'    => 'Super',
			'lname'    => 'Admin',
			'email'    => 'admin@wlion.com',
			'password' => 'pass2009',
			'status'   => Status::ACTIVE
		]);
		$user->attachRole($role_superadmin);
	}
}
