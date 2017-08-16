<?php

require_once '../classes/connection.php';
// require_once 'password.php';
//login student

if(!empty($_POST)){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $response["success"] = false;

  $query = $db->prepare("
		SELECT * FROM student
		WHERE username = :username
		LIMIT 1
	");

	$query->execute([
    'username' => $username
  ]);

  if($query = $query->fetch(PDO::FETCH_ASSOC)){
    $db_id = $query['id'];
    $db_name = $query['name'];
    $db_email = $query['email'];
    $db_username = $query['username'];
    $db_password = $query['password'];

    // check is input password matches db password
    if($password == $db_password){
      $response['id'] = $db_id;
      $response['name'] = $db_name;
      $response['email'] = $db_email;
      $response["success"] = true;
    }


  }


  echo json_encode($response);
}
