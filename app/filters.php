<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('incomplete', function() {

    $user = Auth::user();

    if( ! is_null($user->ended_on)) {
        // COMPLETED
        return Redirect::route('result');
    }

});

Route::filter('complete', function() {

    $user = Auth::user();

    if(is_null($user->ended_on)) {
        // IN-COMPLETE
        return Redirect::route('start');
    }

});

Route::filter('in-progress', function() {
	$user = Auth::user();

    if( ! is_null($user->ended_on)) {
        // COMPLETED
        return Response::json(array('redirect' => route('result')));
    } else if( ! is_null($user->started_on)) {
        // RETURNING USER
        // IN-COMPLETE
        // CONTINUE
    } else {
        // NEW FRESH USER
        return Response::json(array('redirect' => route('start')));
    }
});

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::json(array('redirect' => route('home')));
		}
		else
		{
			return Redirect::route('home');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::route('start');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});