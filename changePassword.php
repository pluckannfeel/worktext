<?php
require_once 'core/init.php';
$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('index.php');
	die();
}

if(Input::exists()){
	$new_password = Input::get('password_new');
	$new_password_again = Input::get('password_new_again');

	if(Token::check(Input::get('token'))){
		if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password){
			Session::flash('changepasserror', 'Your current password is incorrect.');
			Redirect::to('dashboard.php');
		}else{
			if($new_password_again != $new_password){
				Session::flash('changepasserror', 'New passwords does not match');
				Redirect::to('dashboard.php');
			}else{
				$salt = Hash::salt(32);
				$user->update(array(
					'password' => Hash::make($new_password, $salt),
					'salt' => $salt
				));

				Session::flash('changepassok', 'Password is updated.');
				Redirect::to('dashboard.php');
			}
		}
	}
}

?>