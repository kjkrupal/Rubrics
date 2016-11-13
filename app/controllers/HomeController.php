<?php

class HomeController extends BaseController {

	public function home()
	{
		Mail::send('emails.auth.test', array('name' => 'Krupal'), function($message){
    		$message->to('kjkrupal@gmail.com', 'Krupal')->subject('Welcome!');
		});
		return View::make('home');
	}

}
