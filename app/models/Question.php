<?php

class Question extends Eloquent {

    protected $table = 'questions';
    public $timestamps = false;

    public function getOptionsAttribute($value) {
        $t = unserialize($value);
        if($t) return $t;
        else return array();
    }

    public function scopeGetOneNonRepetativeRandom1($query, $questions_served) {
        if(count($questions_served) > 0) return $query->whereNotIn('id', $questions_served)->take(1);
        else $query->take(1);
    }

    public function scopeGetOneNonRepetativeRandom($query, $questions_served) {
        if(count($questions_served) > 0) return $query->whereNotIn('id', $questions_served)->orderByRaw("RAND()")->take(1);
        else $query->orderByRaw("RAND()")->take(1);
    }

}
