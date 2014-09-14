<?php

use Carbon\Carbon;

class APIController extends CrazyController {

    public function finish() {
        if($this->user->isClockExpired($config['total_time'])) {
            $this->user->earlyFinish($config['total_time']);
        } else {
            $this->user->finish();
        }
        $this->user->writeScore();
        $this->user->save();

        return Redirect::ajaxRoute('result');
    }

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
            return Redirect::ajaxRoute('arena');
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

            return Redirect::ajaxRoute('result');
        }

        $qid = $this->user->nextQuestion();
        $this->user->save();

        return $this->nextQuestion($qid);
    }

    public function track() {
        return Response::json($this->user->question_track);
    }

    public function clock() {
        return Response::json($this->user->getRemainingSeconds($this->config['total_time']));
    }

}