<?php

use Carbon\Carbon;

class APIController extends BaseController {

    private $user;
    private $config;
    private $response;

    private function getNextQuestion() {
        return Question::getOneNonRepetativeRandom(array_keys($this->user->question_track))->first();
    }

    private function isLastQuestion() {
        if($this->user->question_number == $this->config['total_questions']) {
            $this->response['last'] = true;
        }
    }

    private function prepareResponse($question) {
        $this->response['question'] = $question->toArray();
        $this->response['question_number'] = $this->user->question_number;
        $this->response['score'] = $this->user->score;
        $this->response['correct_score'] = ($this->user->correct_count + 1) * $this->config['correct_multiplier'];
        $this->response['incorrect_score'] = ($this->user->incorrect_count + 1) * $this->config['incorrect_multiplier'];
    }

    private function nextQuestion() {
        $this->user->setScore();
        if($this->user->question_number == $this->config['total_questions']) {
            $this->user->ended_on = new \DateTime();
            $this->response['done'] = true;
        } else {
            $next_question = $this->getNextQuestion();
            $this->user->setNextQuestion($next_question);
            $this->isLastQuestion();
            $this->prepareResponse($next_question);
        }
        $this->user->save();

        return Response::json($this->response);
    }

    public function __construct() {
        $this->user = Auth::user();
        $this->config = Config::get('crazyquery');
        $this->response = array();
    }

    public function track() {
        return Response::json(json_encode($this->user->question_track));
    }

    public function clock() {
        $c = Carbon::createFromFormat('Y-m-d H:i:s', $this->user->started_on);
        $c->addMinutes($this->config['total_time']);

        return Response::json(Carbon::now()->diffInSeconds($c) * 1000);
    }

    public function init() {
        if($this->user->question_number == 0) {
            $question = $this->getNextQuestion();

            $this->user->setNextQuestion($question);
            $this->user->save();
        } else {
            $question = Question::find($this->user->question_id);
            $this->isLastQuestion();
        }
        $this->prepareResponse($question);
        $this->response['question_track'] = json_encode($this->user->question_track);

        return Response::json($this->response);
    }

    public function skip() {
        return $this->nextQuestion();
    }

    public function answer() {
        $answer = (int) Input::get('answer');

        $question = Question::find($this->user->question_id);

        if($answer == $question->answer) {
            $this->user->correctAnswer($this->config['correct_multiplier']);
            $this->response['result'] = true;
        } else {
            $this->user->incorrectAnswer($this->config['incorrect_multiplier']);
            $this->response['result'] = false;
        }

        return $this->nextQuestion();
    }

}