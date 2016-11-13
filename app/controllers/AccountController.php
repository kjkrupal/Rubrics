<?php

class AccountController extends BaseController{

	public function getCreate(){
		return View::make('account.create');
	}

	public function postCreate(){
		return 'Success';
	}
}