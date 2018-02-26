<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncements extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::dropIfExists('announcements');
		Schema::create('announcements', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('title', 128);
			$table->string('image', 225);
			$table->text('announcement')->nullable();
			$table->smallInteger('status')->unsigned();
			$table->smallInteger('display_order')->default(0);
			$table->timestamps();

			$table->index('status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('announcements');
	}
}
