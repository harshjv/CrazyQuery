<?php

class APIController extends BaseController {

    public function skip() {
        $user = Auth::user();

        $questions_served = $user->questions_served;
        $questions_track = $user->questions_track;

        $question = Question::find($user->question_id);

        $questions_track[$user->questions_served_count] = $user->points;
        $user->questions_track = $questions_track;

        if($user->questions_served_count != Config::get('crazyquiz.total_questions')) {
            array_push($questions_served, $user->question_id);

            $question = Question::getOneNonRepetativeRandom($questions_served)->get();
            $question = $question[0];

            $user->questions_served_count++;
            $user->question_id = $question->id;
            $user->questions_served = $questions_served;

            if(Config::get('crazyquiz.total_questions') == $user->questions_served_count) {
                $response['last'] = true;
            }

            $response['question'] = $question->toArray();
            $response['points'] = $user->points;
            $response['stats']['correct_answers'] = $user->correct_answers;
            $response['stats']['incorrect_answers'] = $user->incorrect_answers;
            $response['questions_served_count'] = $user->questions_served_count;
        } else {
            // ANSWER OF LAST QUESTION IS RECEIVED
            $response['done'] = true;
            $user->done = true;
            $user->ended_on = new \DateTime();
        }

        $user->save();
        return Response::json($response);
    }

    public function answer() {
        $answer = Input::get('answer');
        $user = Auth::user();

        $questions_served = $user->questions_served;
        $questions_track = $user->questions_track;

        $question = Question::find($user->question_id);

        if($answer == $question->answer) {
            // Correct
            $user->correct_answers++;
            $user->points += $user->correct_answers * 10;
            $response['result'] = true;
        } else {
            // Incorrect
            $user->incorrect_answers++;
            $user->points -= $user->incorrect_answers * 10;
            $response['result'] = false;
        }

        $questions_track[$user->questions_served_count] = $user->points;
        $user->questions_track = $questions_track;

        if($user->questions_served_count != Config::get('crazyquiz.total_questions')) {
            array_push($questions_served, $user->question_id);

            $question = Question::getOneNonRepetativeRandom($questions_served)->get();
            $question = $question[0];

            $user->questions_served_count++;
            $user->question_id = $question->id;
            $user->questions_served = $questions_served;

            if((Config::get('crazyquiz.total_questions')) == $user->questions_served_count) {
                $response['last'] = true;
            }

            $response['question'] = $question->toArray();
            $response['points'] = $user->points;
            $response['stats']['correct_answers'] = $user->correct_answers;
            $response['stats']['incorrect_answers'] = $user->incorrect_answers;
            $response['questions_served_count'] = $user->questions_served_count;
        } else {
            // ANSWER OF LAST QUESTION IS RECEIVED
            $response['done'] = true;
            $user->done = true;
            $user->ended_on = new \DateTime();
        }

        $user->save();
        return Response::json($response);
    }

}