<?php

use Carbon\Carbon;

class ArenaController extends BaseController {

    public function handle() {
        $user = Auth::user();

        return View::make('arena', compact('user'));
    }

    public function start() {
        $user = Auth::user();

        return View::make('start', compact('user'));
    }

    public function start_session() {
        $user = Auth::user();
        $user->start();
        $user->save();

        return Redirect::to('arena');
    }

    public function finish() {
        $user = Auth::user();
        $user->setScore();
        $user->finish();
        $user->save();

        return Redirect::route('result');
    }

    public function result() {
        $user = Auth::user();

        $max_mins = Config::get('crazyquery.total_time');

        // COMPLETED
        // SHOW RESULT
        $s = Carbon::createFromFormat('Y-m-d H:i:s', $user->started_on);
        $e = Carbon::createFromFormat('Y-m-d H:i:s', $user->ended_on);

        $min = $e->diffInMinutes($s);

        if($min > $max_mins) {
            $time['m'] = $max_mins;
            $time['s'] = 0;
        } else {
            $sec = $min * 60;
            $time['m'] = (int) ($sec / 60);
            $time['s'] = (int) ($sec % 60);
        }

        if($time['m'] < 10) {
            $time['m'] = '0' . $time['m'];
        }

        if($time['s'] < 10) {
            $time['s'] = '0' . $time['s'];
        }

        return View::make('result', compact('user', 'time'));
    }

    public function logout() {
        Auth::logout();

        return Redirect::route('home');
    }

}