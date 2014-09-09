<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

	public $timestamps = false;

    public function getQuestionsServedAttribute($value) {
        $t = unserialize($value);
        if($t) return $t;
        else return array();
    }

    public function getQuestionsTrackAttribute($value) {
        $t = unserialize($value);
        if($t) return $t;
        else return array();
    }

    public function setQuestionsServedAttribute($value) {
        $this->attributes['questions_served'] = serialize($value);
    }

    public function setQuestionsTrackAttribute($value) {
        $this->attributes['questions_track'] = serialize($value);
    }

    public function resetMe() {
        $this->first_name = NULL;
        $this->last_name = NULL;

        $this->enrolment_number = NULL;

        $this->question_id = 0;
        $this->questions_served_count = 0;

        $this->questions_served = NULL;
        $this->questions_track = NULL;

        $this->points = 0;

        $this->correct_answers = 0;
        $this->incorrect_answers = 0;
        $this->skipped_questions = 0;

        $this->done = false;
        $this->started_on = NULL;
        $this->ended_on = NULL;
    }

}