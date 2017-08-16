<?php

require_once '../classes/connection.php';
require_once 'password.php';
//register student

if(!empty($_POST)){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $response['success'] = false;

  $insert = $db->prepare("
    INSERT INTO student (name, email, username, password)
    VALUES (:name, :email, :username, :password)
  ");

  if(!isStudentExists($db, $email, $username)){
    if($insert->execute([
      'name' => $name,
      'email' => $email,
      'username' => $username,
      'password' => $password
    ]))
      $response['success'] = true;
  }

    echo json_encode($response);
}

function isStudentExists($db, $email, $username){
  $query = $db->prepare("
		SELECT * FROM student
		WHERE email = :email
    OR username = :username
	");

	$query->execute([
    'email' => $email,
    'username' => $username
  ]);

  if($query = $query->fetch(PDO::FETCH_ASSOC))
    return true;
  else
    return false;
}
