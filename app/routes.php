<?php

Route::pattern('page', '[0-9]+');
Route::pattern('id', '[0-9]+');

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@handle'));
Route::post('/', array('as' => 'login_check', 'uses' => 'UserController@login'));

Route::get('/score', array('as' => 'score', 'uses' => 'ArenaController@score'));
Route::get('/reset', array('as' => 'reset', 'uses' => 'ArenaController@reset'));
Route::post('/do_reset', array('as' => 'do_reset', 'uses' => 'ArenaController@do_reset'));
Route::post('/do_reset_all', array('as' => 'do_reset_all', 'uses' => 'ArenaController@do_reset_all'));
Route::post('/do_end', array('as' => 'do_end', 'uses' => 'ArenaController@do_end'));

Route::group(array('before' => 'auth|reset_check'), function() {

    Route::group(array('before' => 'in_progress'), function() {
        Route::get('start', array('as' => 'start', 'uses' => 'ArenaController@start'));

        Route::get('finish', array('as' => 'finish', 'uses' => 'ArenaController@finish'));

        Route::post('start', array('as' => 'start_session', 'uses' => 'ArenaController@start_session'));

        Route::get('arena', array('as' => 'arena', 'uses' => 'ArenaController@handle'));

        Route::post('api/answer', array('as' => 'answer', 'uses' => 'APIController@answer'));
        Route::post('api/skip', array('as' => 'skip', 'uses' => 'APIController@skip'));
    });

    Route::post('api/init', array('as' => 'init', 'uses' => 'ArenaController@init'));
    Route::post('api/track', array('as' => 'track', 'uses' => 'ArenaController@track'));
    Route::post('api/clock', array('as' => 'clock', 'uses' => 'ArenaController@clock'));

    Route::get('result', array('as' => 'result', 'uses' => 'ArenaController@result'));

});