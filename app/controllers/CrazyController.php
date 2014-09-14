<?php

class CrazyController extends BaseController {

    protected $user;
    protected $config;
    protected $response;

    public function __construct() {
        $this->user = Auth::user();
        $this->config = Config::get('crazyquery');
        $this->response = array();
    }

    protected function getQuestion($qid) {
        return Cache::rememberForever('question_'.$qid, function() use($qid) {
            return Question::find($qid);
        });
    }

    protected function nextQuestion($qid) {
        $question = $this->getQuestion($qid);
        if($this->user->question_number == $this->config['total_questions']) {
            $this->response['last'] = true;
        }
        $this->prepareResponse($question);

        return Response::json($this->response);
    }

    protected function prepareResponse($question) {
        $this->response['question'] = $question->toArray();
        $this->response['question_number'] = $this->user->question_number;
        $this->response['score'] = $this->user->score;
        $this->response['correct_score'] = ($this->user->correct_count + 1) * $this->config['correct_multiplier'];
        $this->response['incorrect_score'] = ($this->user->incorrect_count + 1) * $this->config['incorrect_multiplier'];
    }

}