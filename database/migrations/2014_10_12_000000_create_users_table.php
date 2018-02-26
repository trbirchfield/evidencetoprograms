<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::dropIfExists('users');
		Schema::create('users', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->tinyInteger('status')->unsigned();
			$table->string('fname', 32);
			$table->string('lname', 32);
			$table->string('email', 255)->unique();
			$table->string('password', 60);
			$table->string('phone', 32)->nullable();
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
	}
}
