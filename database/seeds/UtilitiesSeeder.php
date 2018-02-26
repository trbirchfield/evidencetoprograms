<?php

use Illuminate\Database\Seeder;

class UtilitiesSeeder extends Seeder {
	/**
	 * Seed statuses.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('statuses')->truncate();

		DB::table('statuses')->insert([
			['status' => 'Active'],
			['status' => 'Inactive']
		]);
	}
}
