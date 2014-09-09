<?php

use Carbon\Carbon;

class ArenaController extends BaseController {

    public function reset() {
        $users = User::all();
        return View::make('reset', compact('users'));
    }

    public function do_end() {

        DB::transaction(function() {
            User::chunk(20, function($users) {
                foreach ($users as $user) {

                    $questions_track = $user->questions_track;

                    $questions_track[$user->questions_served_count] = $user->points;
                    $user->questions_track = $questions_track;

                    $user->ended_on = Carbon::now();
                    $user->done = true;

                    $user->save();
                }
            });
        });

        return Redirect::to('reset');
    }

    public function do_reset_all() {

        DB::transaction(function() {
            User::chunk(20, function($users) {
                foreach ($users as $user) {
                    $user->resetMe();
                    $user->save();
                }
            });
        });

        return Redirect::to('reset');
    }

    public function do_reset() {
        $user_id = (int) Input::get('user_id');
        $user = User::find($user_id);
        $user->resetMe();
        $user->save();
        return Redirect::to('reset');
    }

    public function score() {
        $users = User::whereNotNull('started_on')->orderBy('points', 'DESC')->get();
        return View::make('score', compact('users'));
    }

    public function start() {
        $user = Auth::user();

        if($user->done) {
            return Redirect::to('result');
        } elseif(is_null($user->first_name)) {
            Auth::logout();
            return Redirect::to('home');
        }

        return View::make('start', compact('user'));
    }

    public function finish() {
        $user = Auth::user();

        if($user->done) {
            return Redirect::to('result');
        }

        $questions_track = $user->questions_track;

        $questions_track[$user->questions_served_count] = $user->points;
        $user->questions_track = $questions_track;

        $user->ended_on = Carbon::now();
        $user->done = true;
        $user->save();

        return Redirect::to('result');
    }

    public function start_session() {
        $user = Auth::user();

        if($user->done) {
            return Redirect::to('result');
        }

        $user->started_on = Carbon::now();
        $user->save();

        return Redirect::to('arena');
    }
    
    public function handle() {
        $user = Auth::user();

        if($user->done) {
            return Redirect::to('result');
        } elseif(is_null($user->started_on) || !$user->started_on) {
            return Redirect::to('start');
        }

        return View::make('arena');
    }

    public function result() {
        $user = Auth::user();

        if( ! $user->done) {
            return Redirect::to('arena');
        }

        $s = Carbon::createFromFormat('Y-m-d H:i:s', $user->started_on);
        $e = Carbon::createFromFormat('Y-m-d H:i:s', $user->ended_on);

        $sec = $e->diffInSeconds($s);

        $time['m'] = (int) ($sec / 60);
        $time['s'] = (int) ($sec % 60);

        if($time['m'] < 10) {
            $time['m'] = '0' . $time['m'];
        }

        if($time['s'] < 10) {
            $time['s'] = '0' . $time['s'];
        }

        return View::make('result', compact('user', 'time'));
    }

    public function track() {
        $user = Auth::user();

        return Response::json(json_encode($user->questions_track));
    }

    public function clock() {
        $user = Auth::user();
        $c = Carbon::createFromFormat('Y-m-d H:i:s', $user->started_on);

        $c->addMinutes(Config::get('crazyquiz.total_time'));
        return Response::json(Carbon::now()->diffInSeconds($c) * 1000);
    }

    public function init() {
        $response = array();

        $user = Auth::user();

        if($user->questions_served_count == 0) {
            // NO QUESTIONS ARE SERVED
            $question = Question::getOneNonRepetativeRandom($user->questions_served)->first();

            $user->questions_served_count++;
            $user->question_id = $question->id;
            $user->save();
        } else {
            // ALREADY SERVED
            // FETCH THE USER'S LAST UN-ANSWERED QUESTION
            $question = Question::find($user->question_id);

            if($user->questions_served_count == Config::get('crazyquiz.total_questions')) {
                $response['last'] = true;
            }
        }

        $response['question'] = $question->toArray();
        $response['points'] = $user->points;
        $response['questions_served_count'] = $user->questions_served_count;
        $response['questions_track'] = json_encode($user->questions_track);

        $response['stats']['correct_answers'] = $user->correct_answers;
        $response['stats']['incorrect_answers'] = $user->incorrect_answers;
        $response['stats']['skipped_answers'] = $user->skipped_answers;

        return Response::json($response);
    }

}