<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoles extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::dropIfExists('role_user');
		Schema::dropIfExists('permission_user');
		Schema::dropIfExists('permission_role');
		Schema::dropIfExists('roles');
		Schema::dropIfExists('permissions');
		Schema::create('roles', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->string('description')->nullable();
			$table->integer('level')->default(1);
			$table->timestamps();
		});
		Schema::create('permissions', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('description')->nullable();
			$table->string('model')->nullable();
			$table->timestamps();
		});
		Schema::create('role_user', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('role_id')->unsigned()->index();
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
		Schema::create('permission_user', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('permission_id')->unsigned()->index();
			$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
		Schema::create('permission_role', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('permission_id')->unsigned()->index();
			$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
			$table->integer('role_id')->unsigned()->index();
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('role_user');
		Schema::drop('permission_user');
		Schema::drop('permission_role');
		Schema::drop('roles');
		Schema::drop('permissions');
	}
}
