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

    public function getQuestionTrackAttribute($value) {
        Log::info($value);
        if(is_null($value)) return array();
        return unserialize($value);
    }

    public function setQuestionTrackAttribute($value) {
        $this->attributes['question_track'] = serialize($value);
    }

    public function resetMe() {
        $this->first_name = NULL;
        $this->last_name = NULL;

        $this->enrolment_number = NULL;

        $this->question_id = 0;
        $this->questions_served_count = 0;

        $this->questions_served = NULL;
        $this->question_track = NULL;

        $this->points = 0;

        $this->correct_answers = 0;
        $this->incorrect_answers = 0;
        $this->skipped_questions = 0;

        $this->done = false;
        $this->started_on = NULL;
        $this->ended_on = NULL;
    }

    public function correctAnswer($multiplier) {
        $this->correct_count++;
        $this->score += $this->correct_count * $multiplier;
    }

    public function incorrectAnswer($multiplier) {
        $this->incorrect_count++;
        $this->score -= $this->incorrect_count * $multiplier;
    }

    public function setScore() {
        $t = $this->question_track;
        $t[$this->question_number] = $this->score;
        $this->question_track = $t;
    }

    public function setNextQuestion($question) {
        $this->question_number++;
        $this->question_id = $question->id;
    }

    public function start() {
        $this->started_on = new \DateTime();
    }

    public function finish() {
        $this->ended_on = new \DateTime();
    }

}