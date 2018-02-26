<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFAQs extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::dropIfExists('faqs');
		Schema::create('faqs', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('faq_category_id')->unsigned()->index();
			$table->text('question');
			$table->text('answer');
			$table->smallInteger('status')->unsigned()->index();
			$table->smallInteger('display_order')->default(0);
			$table->timestamps();
			$table->foreign('faq_category_id')->references('id')->on('faq_categories')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('faqs');
	}
}
