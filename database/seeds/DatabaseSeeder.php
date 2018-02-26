<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();
		if (!app()->environment('testing')) {
			DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		}

		$this->call('UtilitiesSeeder');
		$this->call('UsersSeeder');
		$this->call('SectionsSeeder');
		$this->call('MetaSeeder');
	}
}
