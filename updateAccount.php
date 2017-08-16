<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('index.php');
	die();
}

if(Input::exists()){
	if(Token::check(Input::get('token'))){
		try{
		$user->update(array(
			'firstname' => Input::get('firstname'),
			'lastname' => Input::get('lastname')
		));

		Session::flash('updatedinfo', 'Information has been changed.');
		Redirect::to('dashboard.php');
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
}


?>


