<?php

use Carbon\Carbon;

class APIController extends AjaxController {

    public function init() {
        $qid = $this->user->getQuestionID();
        $this->response['question_track'] = $this->user->question_track;

        return $this->nextQuestion($qid);
    }

    public function skip() {
        $this->user->writeScore();
        $qid = $this->user->nextQuestion();
        $this->user->save();

        return $this->nextQuestion($qid);
    }

    public function answer() {
        $question_id = (int) Input::get('question_id');
        $answer = (int) Input::get('answer');

        $qid = $this->user->getQuestionID();

        if($qid != $question_id) {
            return $this->ajaxRedirectToRoute('arena');
        }

        $question = $this->getQuestion($qid);//Question::find($qid);

        if($answer == $question->answer) {
            $this->user->correctAnswer($this->config['correct_multiplier']);
            $this->response['result'] = true;
        } else {
            $this->user->incorrectAnswer($this->config['incorrect_multiplier']);
            $this->response['result'] = false;
        }

        $this->user->writeScore();
        $this->user->save();

        if($this->user->question_number == $this->config['total_questions']) {
            $this->user->finish();
            $this->user->save();

            return $this->ajaxRedirectToRoute('result');
        }

        $qid = $this->user->nextQuestion();
        $this->user->save();

        return $this->nextQuestion($qid);
    }

    public function track() {
        return Response::json($this->user->question_track);
    }

    public function clock() {
        $c = Carbon::createFromFormat('Y-m-d H:i:s', $this->user->started_on);
        $c->addMinutes($this->config['total_time']);

        return Response::json(Carbon::now()->diffInSeconds($c) * 1000);
    }

}