<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedPrograms extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::dropIfExists('featured_programs');
		Schema::create('featured_programs', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('title', 225);
			$table->string('image', 225);
			$table->string('youtube_id', 128);
			$table->text('summary');
			$table->smallInteger('status')->unsigned()->index();
			$table->smallInteger('display_order')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('featured_programs');
	}
}
