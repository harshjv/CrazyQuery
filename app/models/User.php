<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Carbon\Carbon;

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

    public function earlyFinish($max_mins) {
        $s = Carbon::createFromFormat('Y-m-d H:i:s', $this->started_on);
        $this->ended_on = $s->addMinutes($max_mins);
    }

    public function isStarted() {
        if( ! is_null($this->started_on)) return true;
        else return false;
    }

    public function isFinished() {
        if($this->isStarted() && ! is_null($this->ended_on)) return true;
        else return false;
    }

    public function isInProgress() {
        if($this->isStarted() && ! $this->isFinished()) return true;
        else return false;
    }

    public function isFresh() {
        if( ! $this->isStarted() && ! $this->isFinished()) return true;
        else return false;
    }

    public function isClockExpired($max_mins) {
        $s = Carbon::createFromFormat('Y-m-d H:i:s', $this->started_on);
        $n = Carbon::now();

        $sec = $n->diffInSeconds($s);

        if($sec > ($max_mins * 60)) {
            return true;
        } else {
            return false;
        }
    }

    public function getRemainingSeconds($total_time) {
        $now = Carbon::now();
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $this->started_on);
        $start->addMinutes($total_time);

        return $now->diffInSeconds($start);
    }

    public function getDuration() {
        $s = Carbon::createFromFormat('Y-m-d H:i:s', $this->started_on);
        $e = Carbon::createFromFormat('Y-m-d H:i:s', $this->ended_on);

        $diff = $e->diffInSeconds($s);

        $sec = (int) ($diff % 60);
        $min = (int) (($diff / 60) % 60);
        $hr = (int) ($diff / 3600);

        return sprintf('%02d:%02d:%02d', $hr, $min, $sec);
    }

}