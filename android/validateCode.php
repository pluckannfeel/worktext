<?php

require_once '../classes/connection.php';

if(!empty($_POST)){
  $code = $_POST['invitation_code'];
  $response["success"] = false;

  $query = $db->prepare("
      SELECT * FROM users
      WHERE code = :code
  ");

  $query->execute([
    'code' => $code
  ]);

  if ($query = $query->fetch(PDO::FETCH_ASSOC)) {
    $response["success"] = true;
  }

  echo json_encode($response);

}
