<?php

require_once '../classes/connection.php';

if(!empty($_POST)){
	$invitation_code = $_POST['invitation_code'];
	// $email = $_POST['email'];
	$user_id = getUserID($db, $invitation_code);


	$query = $db->prepare("
	SELECT l.id, l.title, l.date_created
	 FROM lessons l INNER JOIN users u
	 ON l.user_id = u.id
	 WHERE l.user_id = :user_id
	");
	$query->execute(['user_id' => $user_id]);

	$result = $query->fetchAll();
	$count = count($result);

	$response['lessons'] = array();
	$response['success'] = false;

	if($count > 0){
		$response['success'] = true;
		foreach ($result as $row) {
			$lessons = array();
			$lessons['lesson_id'] = $row[0];
			$lessons['title'] = $row[1];
			$lessons['date_created'] = $row[2];

			array_push($response['lessons'], $lessons);
		}
	}

	echo json_encode($response);
}

function getUserID($db, $invitation_code){
	$user_id = 0;
	$query = $db->prepare("
		SELECT id
		FROM users
		WHERE code = :code
	");

	$query->execute([
		'code' => $invitation_code
	]);

	if($query = $query->fetch(PDO::FETCH_ASSOC)){
		$user_id = $query['id'];
		return $user_id;
	}

	return $user_id;
}
