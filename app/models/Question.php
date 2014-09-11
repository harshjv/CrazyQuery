<?php

class Question extends Eloquent {

    protected $table = 'questions';
    public $timestamps = false;
    protected $hidden = array('answer');

    public function getOptionsAttribute($value) {
        $t = unserialize($value);
        if($t) return $t;
        else return array();
    }

    public function scopeGetOneNonRepetativeRandom1($query, $question_ids) {
        if(count($question_ids) > 0) return $query->whereNotIn('id', $question_ids)->take(1);
        else $query->take(1);
    }

    public function scopeGetOneNonRepetativeRandom($query, $question_ids) {
        if(count($question_ids) > 0) return $query->whereNotIn('id', $question_ids)->orderByRaw("RAND()")->take(1);
        else $query->orderByRaw("RAND()")->take(1);
    }

}
