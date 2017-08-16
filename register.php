<?php
require_once 'core/init.php';
require_once 'classes/generate_code.php';
require_once 'classes/connection.php';

if(Input::exists()){
	if(Token::check(Input::get('token'))) {

		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'firstname' => array(
				'required' => true,
				'min' => 2,
				'max' => 128
				),
			'lastname' => array(
				'required' => true,
				'min' => 2,
				'max' => 128
				),
			'email' => array(
				'required' => true,

				'min' => 4,
				'max' => 64
				),
			'password' => array(
				'required' => true,
				'min' => 6
				),
			'confirm_password' => array(
				'required' => true,
				// 'matches' => 'password'
				),
			));

		// if($validation->passed()){
		// 	echo 'Passed';
		// }else{
		// 	print_r($validation->errors());
		// }

		if(!$validation->passed()){
			foreach ($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}else {
			$user = new User();
			$salt = Hash::salt(32);

			$exists = $user->exists($user->find(Input::get('email')));
			if($exists){
				Session::flash('emailexists', " This Email address is already registered.");
				Redirect::to('index.php');
			}else{
				$password = Input::get('password');
				$confirm_password = Input::get('confirm_password');

				if($password != $confirm_password){
					Session::flash('passwordnotmatch', " Passwords doesn't match.");
					Redirect::to('index.php');
				}else{
					try {
					$user->create(array(
						'firstname' => Input::get('firstname'),
						'lastname' => Input::get('lastname'),
						'email' => Input::get('email'),
						'password' => Hash::make(Input::get('password'), $salt),
						'salt' => $salt,
						'joined' => date('Y-m-d H:i:s'),
						'group_user' => 1,
						'code' => get_rand_alphanumeric(8)
					));

					Session::flash('registered', " Account was registered successfully.");
					Redirect::to('index.php');

					}catch (Exception $e) {
						die($e->getMessage());
					}
				}
			}
		}
	}
}
?>
