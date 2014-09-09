<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	public function up() {
		Schema::create('users', function($table) {
			$table->increments('id')->unsigned();
			$table->string('username');
			$table->string('password');

			$table->string('remember_token')->nullable();

			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();

			$table->string('enrolment_number')->nullable();

			$table->integer('question_id')->default(0)->unsigned();
			$table->integer('questions_served_count')->default(0)->unsigned();

			$table->text('questions_served');
			$table->text('questions_track');

			$table->integer('points')->default(0);

			$table->integer('correct_answers')->default(0)->unsigned();
			$table->integer('incorrect_answers')->default(0)->unsigned();
			$table->integer('skipped_questions')->default(0)->unsigned();

			$table->boolean('done')->default(false);
			$table->timestamp('started_on')->nullable();
			$table->timestamp('ended_on')->nullable();
		});
	}

	public function down() {
		Schema::drop('users');
	}

}