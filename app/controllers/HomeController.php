<?php

class HomeController extends BaseController {
	
	public function handle() {
		return View::make('home');
	}

}