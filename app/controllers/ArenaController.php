<?php

class ArenaController extends BaseController {

    public function handle() {
        $user = Auth::user();

        return View::make('arena/index', compact('user'));
    }

    public function start() {
        $user = Auth::user();

        return View::make('arena/start', compact('user'));
    }

    public function start_session() {
        $user = Auth::user();
        $user->start();
        $user->save();

        return Redirect::route('arena');
    }

    public function result() {
        $user = Auth::user();

        return View::make('arena/result', compact('user'));
    }

    public function logout() {
        Auth::logout();

        return Redirect::route('home');
    }

    public function proper_redirect() {
        $user = Auth::user();
        if($user->isFresh()) {
            return Redirect::ajaxAwareRoute('start');
        } else  if($user->isInProgress()) {
            return Redirect::ajaxAwareRoute('arena');
        } else {
            return Redirect::ajaxAwareRoute('result');
        }
    }
}