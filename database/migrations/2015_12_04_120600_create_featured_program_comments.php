<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedProgramComments extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::dropIfExists('featured_program_comments');
		Schema::create('featured_program_comments', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('featured_program_id')->unsigned()->index();
			$table->string('fname', 128);
			$table->string('email', 225);
			$table->text('comment');
			$table->smallInteger('status')->unsigned()->index();
			$table->timestamps();
			$table->foreign('featured_program_id')->references('id')->on('featured_programs')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('featured_program_comments');
	}
}
