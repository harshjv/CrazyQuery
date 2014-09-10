<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@handle'));
Route::post('/', array('as' => 'login_check', 'uses' => 'UserController@login'));

Route::get('/score', array('as' => 'score', 'uses' => 'ArenaController@score'));

Route::group(array('before' => 'auth'), function() {

    Route::get('arena', array('as' => 'arena', 'uses' => 'ArenaController@handle'));

    Route::get('start', array('as' => 'start', 'uses' => 'ArenaController@start'));
    Route::post('start', array('as' => 'start_session', 'uses' => 'ArenaController@start_session'));

    Route::get('finish', array('as' => 'finish', 'uses' => 'ArenaController@finish'));

    Route::get('result', array('as' => 'result', 'uses' => 'ArenaController@result'));
    Route::get('logout', array('as' => 'logout', 'uses' => 'ArenaController@logout'));

    Route::group(array('before' => 'in-progress'), function() {

        Route::post('api/init', array('as' => 'init', 'uses' => 'APIController@init'));
        Route::post('api/clock', array('as' => 'clock', 'uses' => 'APIController@clock'));
        Route::post('api/answer', array('as' => 'answer', 'uses' => 'APIController@answer'));
        Route::post('api/skip', array('as' => 'skip', 'uses' => 'APIController@skip'));

    });

    Route::post('api/track', array('as' => 'track', 'uses' => 'APIController@track'));

});