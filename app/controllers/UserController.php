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
            $user->first_name = ucfirst(strtolower(self::spaces(Input::get('first_name'))));
            $user->last_name = ucfirst(strtolower(self::spaces(Input::get('last_name'))));
            $user->enrolment_number = ucfirst(strtolower(self::spaces(Input::get('enrolment_number'))));
            $user->save();
        }

        if(Hash::needsRehash($user->password)) {
            $user->password = Hash::make(Input::get('password'));
            $user->save();
        }

        return Redirect::to('start');
    }
    else {
      return Redirect::back()->withInput(Input::except('password'));
    }

  }

  public function logout() {
    Auth::logout();
    return Redirect::to('/');
  }

  public static function string($string)
    {
        $string = self::space($string);
        $string = self::commas($string);
        $string = self::amps($string);

        return trim($string);
    }

    public static function text($string)
    {
        $string = self::commas($string);
        $string = self::amps($string);
        $string = self::lines($string);
        $string = nl2br($string);

        return self::space($string);
    }

    public static function authors($string)
    {
        $string = self::commas($string);
        $string = self::amps($string);
        $string = self::space($string);

        return ucwords(strtolower($string));
    }

    public static function lines($string)
    {
        return preg_replace("/[\r\n]{3,}/", "\r\n\r\n", trim($string));
    }

    public static function spaces($string)
    {
        return preg_replace('/\s+/', ' ', trim($string));
    }

    public static function commas($string)
    {
        $string = preg_replace_callback('/\s*,\s*', function($match) {
            return ", ";
        }, $string);

        $string = preg_replace('/^,\s?|,$/', '', trim($string));

        return $string;
    }

    public static function amps($string)
    {
        $string = preg_replace_callback('/\s*&\s*', function($match) {
            return "& ";
        }, $string);

        $string = preg_replace('/^&\s?|&$/', '', trim($string));

        return $string;
    }

}