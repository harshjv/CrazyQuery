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

    public function getQuestionNumberAttribute() {
        return $this->question_pointer + 1;
    }

    public function getRandomQuestionsAttribute($value) {
        return unserialize($value);
    }

    public function setRandomQuestionsAttribute($value) {
        $this->attributes['random_questions'] = serialize($value);
    }

    public function getQuestionTrackAttribute($value) {
        if(is_null($value)) return array();
        return unserialize($value);
    }

    public function setQuestionTrackAttribute($value) {
        $this->attributes['question_track'] = serialize($value);
    }

    public function correctAnswer($multiplier) {
        $this->correct_count++;
        $this->score += $this->correct_count * $multiplier;
    }

    public function incorrectAnswer($multiplier) {
        $this->incorrect_count++;
        $this->score -= $this->incorrect_count * $multiplier;
    }

    public function writeScore() {
        $t = $this->question_track;
        $t[$this->question_pointer] = $this->score;
        $this->question_track = $t;
    }

    public function getQuestionID() {
        $t = $this->random_questions;

        return $t[$this->question_pointer];
    }

    public function nextQuestion() {
        $this->question_pointer++;

        return $this->getQuestionID();
    }

    public function start() {
        $this->started_on = new \DateTime();
    }

    public function finish() {
        $this->ended_on = new \DateTime();
    }

}