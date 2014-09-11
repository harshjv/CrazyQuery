<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questions extends Migration {

	public function up() {
		Schema::create('questions', function($table) {
			$table->increments('id')->unsigned();
			$table->text('title');
			$table->text('options');
			$table->string('image_path')->nullable();
			$table->integer('answer');
		});
	}

	public function down() {
		Schema::drop('questions');
	}

}