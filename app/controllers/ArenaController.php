<?php

use Carbon\Carbon;

class ArenaController extends BaseController {

    public function handle() {
        $user = Auth::user();

        if( ! is_null($user->ended_on)) {
            // COMPLETED
            return Redirect::route('result');
        } else if( ! is_null($user->started_on)) {
            // RETURNING USER
            // IN-COMPLETE
            // CONTINUE
            return View::make('arena', compact('user'));
        } else {
            // NEW FRESH USER
            return Redirect::route('start');
        }
    }

    public function start() {
        $user = Auth::user();

        if( ! is_null($user->ended_on)) {
            // COMPLETED
            return Redirect::route('result');
        } else if( ! is_null($user->started_on)) {
            // RETURNING USER
            // IN-COMPLETE
            // CONTINUE
            return Redirect::route('arena');
        } else {
            // NEW FRESH USER
            return View::make('start', compact('user'));
        }
    }

    public function start_session() {
        $user = Auth::user();

        if( ! is_null($user->ended_on)) {
            // COMPLETED
            return Redirect::route('result');
        } else if( ! is_null($user->started_on)) {
            // RETURNING USER
            // IN-COMPLETE
            // CONTINUE
            return Redirect::route('arena');
        } else {
            // NEW FRESH USER
            $user->start();
            $user->save();
            return Redirect::to('arena');
        }
    }

    public function finish() {
        $user = Auth::user();

        if( ! is_null($user->ended_on)) {
            // COMPLETED
            return Redirect::route('result');
        } else if( ! is_null($user->started_on)) {
            // IN-COMPLETE
            // FINISH
            $user->setScore();
            $user->finish();
            $user->save();

            return Redirect::route('result');
        } else {
            // NEW FRESH USER
            return Redirect::route('start');
        }
    }

    public function result() {
        $user = Auth::user();

        if( ! is_null($user->ended_on)) {
            // COMPLETED
            // SHOW RESULT
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
        } else if( ! is_null($user->started_on)) {
            // IN-COMPLETE
            return Redirect::route('arena');
        } else {
            // NEW FRESH USER
            return Redirect::route('start');
        }
    }

    public function logout() {
        Auth::logout();

        return Redirect::route('home');
    }

}