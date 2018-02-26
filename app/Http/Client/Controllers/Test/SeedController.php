<?php namespace App\Http\Client\Controllers\Test;

use App\Models\User;
use App\Models\UserData;
use App\Models\Status;
use Bican\Roles\Models\Role;
use Faker;

class SeedController extends BaseController {

	public function getIndex() {

		$role  = Role::where('slug', 'candidate')->first();
		$faker = Faker\Factory::create();

		for ($i = 0; $i < 10; $i++) {
			$user = User::create([
				'fname'    => $faker->firstName(),
				'lname'    => $faker->lastName(),
				'email'    => $faker->email(),
				'password' => $faker->password(),
				'phone'    => $faker->phoneNumber(),
				'status'   => Status::ACTIVE,
				'slug'     => bin2hex(openssl_random_pseudo_bytes(3))
			]);
			UserData::create([
				'user_id' => $user->id,
				'type'    => 2,
				'key'     => 'display_name',
				'value'   => $user->fname . ' ' . $user->lname
			]);
			UserData::create([
				'user_id' => $user->id,
				'type'    => 2,
				'key'     => 'party',
				'value'   => rand(1, 6)
			]);
			$user->attachRole($role);

		}

		dd('done');
	}
}
