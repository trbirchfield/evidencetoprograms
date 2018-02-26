<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaColumnsToSectionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('sections', function(Blueprint $table) {
			$table->text('meta_description')->nullable()->after('body');
			$table->text('meta_keywords')->nullable()->after('meta_description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('sections', function(Blueprint $table) {
			$table->dropColumn('meta_description');
			$table->dropColumn('meta_keywords');
		});
	}
}
