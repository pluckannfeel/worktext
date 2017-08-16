<?php
require_once 'core/init.php';

if(Input::exists()) {
	$user = new User();

	$remember = (Input::get('remember') === 'on') ? true : false;


	$login = $user->login(Input::get('email'), Input::get('password'), $remember);

	if($login){
		Redirect::to('dashboard.php');
	}else{
		Session::flash('loginerror', "Incorrect username or password.");
		Redirect::to('index.php');
	}

	// if($user->isLoggedIn()){
	// 	echo $user->data()->email;
	// }
	

	// if(Token::check(Input::get('token'))) {

	// }
}
?>