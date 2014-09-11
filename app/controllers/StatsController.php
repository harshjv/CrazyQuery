<?php

use Carbon\Carbon;

class StatsController extends BaseController {

    public function score() {
        $users = User::whereNotNull('started_on')->orderBy('score', 'DESC')->get();

        return View::make('score', compact('users'));
    }

    public function idle() {
        $users = User::whereNull('started_on')->get();

        return View::make('idle', compact('users'));
    }

}