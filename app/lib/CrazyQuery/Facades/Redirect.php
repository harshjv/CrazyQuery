<?php

namespace CrazyQuery\Facades;

use Illuminate\Support\Facades\Redirect as BaseRedirect;

class Redirect extends BaseRedirect {

    public static function ajaxAwareRoute($name) {
        if(\Request::ajax()) {
            return Redirect::ajaxRoute($name);
        } else {
            return Redirect::route($name);
        }
    }

    public static function ajaxRoute($name) {
        return \Response::json(['redirect' => route($name)]);
    }

}