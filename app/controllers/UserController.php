<?php

class UserController extends BaseController {

  public function login() {

    if(Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')), false)) {
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
            $user->first_name = ucfirst(strtolower(trim(self::spaces(Input::get('first_name')))));
            $user->last_name = ucfirst(strtolower(trim(self::spaces(Input::get('last_name')))));
            $user->enrolment_number = ucfirst(strtolower(trim(self::spaces(Input::get('enrolment_number')))));
            $user->save();
        }

        if(Hash::needsRehash($user->password)) {
            $user->password = Hash::make(Input::get('password'));
            $user->save();
        }

        return Redirect::route('proper_redirect');
    }
    else {
      return Redirect::back()->withInput(Input::except('password'));
    }

  }

  public function logout() {
    Auth::logout();
    return Redirect::route('logout');
  }

  public static function spaces($string) {
    return preg_replace('/\s+/', ' ', trim($string));
  }

}