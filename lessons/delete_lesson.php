<?php
require_once '../classes/connection.php';
require_once '../classes/Redirect.php';
session_start();

if(isset($_GET['lesson_id'])){
	$lesson_id = $_GET['lesson_id'];
	$title = $_GET['title'];

	$drop_lesson = $db->prepare("
		DELETE FROM lessons
		WHERE id = :id
	");

	$drop_lesson->execute([
		'id' => $lesson_id
	]);

	$_SESSION['lessondeleted'] = "Lesson Titled: '" . $title . "' was deleted.";
	Redirect::to('../dashboard.php');
}else{
	echo 'error deleting data';
}

?>