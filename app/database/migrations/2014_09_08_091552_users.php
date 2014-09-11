<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

    public function up() {
        Schema::create('users', function($table) {
            // ID AND PASSWORD
            $table->increments('id')->unsigned();
            $table->string('username');
            $table->string('password');

            // USER DATA
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('enrolment_number')->nullable();

            // GENERATE RANDOM QUESTION ID'S FOR EACH USER
            $table->text('random_questions');

            // USER'S CURRENT QUESTION POINTER
            $table->integer('question_pointer')->default(0)->unsigned();

            // QUESTION TRACK
            $table->text('question_track')->nullable();

            // POINTS
            $table->integer('score')->default(0);

            // COUNTS
            $table->integer('correct_count')->default(0)->unsigned();
            $table->integer('incorrect_count')->default(0)->unsigned();

            // TIMESTAMPS
            $table->timestamp('started_on')->nullable();
            $table->timestamp('ended_on')->nullable();

            // REMEMBER ME
            $table->string('remember_token')->nullable();
        });
    }

    public function down() {
        Schema::drop('users');
    }

}