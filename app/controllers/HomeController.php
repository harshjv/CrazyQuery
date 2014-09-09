<?php

class HomeController extends BaseController {
	
	public function handle() {
        // return Redirect::to('start');
		return View::make('home');
	}

}