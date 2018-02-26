<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFAQCategories extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::dropIfExists('faq_categories');
		Schema::create('faq_categories', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->smallInteger('status')->unsigned()->index();
			$table->string('title', 128);
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
		Schema::drop('faq_categories');
	}
}
