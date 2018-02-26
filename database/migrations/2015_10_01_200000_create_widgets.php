<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgets extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::dropIfExists('widgets');
		Schema::create('widgets', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->smallInteger('status')->unsigned()->index();
			$table->string('title', 128);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('widgets');
	}
}
