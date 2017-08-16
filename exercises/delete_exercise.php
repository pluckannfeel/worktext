<?php
require_once '../classes/connection.php';
require_once '../classes/Redirect.php';
session_start();

if(isset($_GET['exercise_id'])){
	$exer_id = $_GET['exercise_id'];
	$title = $_GET['title'];

	$delete = $db->prepare("
		DELETE FROM exercises
		WHERE id = :id
	");

	$delete->execute([
		'id' => $exer_id
	]);

	$_SESSION['exercisedeleted'] = "Exercise: '" . $title . "' was deleted.";
	Redirect::to('../dashboard.php');
}else{
	echo 'error deleting data';
}

?>
