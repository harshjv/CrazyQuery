<?php

namespace CrazyQuery\Facades;

use Illuminate\Support\Facades\Response as BaseResponse;

class Response extends BaseResponse {

    public static function ajaxAwareResponse($name) {
        if(Request::ajax()) {
            return Response::json(array('redirect' => route('result')));
        } else {
            return Redirect::route('result');
        }
    }

}