<?php

class AccountController extends BaseController{

	public function getCreate(){
		return View::make('account.create');
	}

	public function postCreate(){
		$validator = Validator::make(Input::all(), 
			array(
				'email' 	=> 'required|max:50|email|unique:users',
				'username' 	=> 'required|max:20|min:3|unique:users',
				'password' 	=> 'required|min:6',
				're-type' 	=> 'required|same:password'
		));

		if ($validator->fails()) {
			return Redirect::route('account-create')->withErrors($validator)->withInput();
		}
		else {

			$email 		= Input::get('email');
			$username 	= Input::get('username');
			$password 	= Input::get('password');

			$code 		= str_random(60);
			$create 	= User::create(array(
					'email' 	=> $email,
					'username' 	=> $username,
					'password' 	=> Hash::make($password),
					'code' 		=> $code,
					'active' 	=> 0
				));

			if ($create) {
				return Redirect::route('home')->with('global', 'Created! Check email to activate');
			}
		}
	}
}