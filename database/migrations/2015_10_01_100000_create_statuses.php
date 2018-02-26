<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatuses extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::dropIfExists('statuses');
		Schema::create('statuses', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('status', 64);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('statuses');
	}
}
