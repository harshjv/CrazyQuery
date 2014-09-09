<?php

class StartController extends BaseController {
	
	public function handle() {
		return View::make('home');
	}

}