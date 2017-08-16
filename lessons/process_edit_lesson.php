<?php
require_once '../classes/connection.php';
require_once '../classes/Redirect.php';
session_start();

if(isset($_GET['lesson_id']) && isset($_POST)){
	$lesson_id = $_GET['lesson_id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$video_embed = $_POST['video_embed'];
	$subject = $_POST['subject'];

	$update_lesson = $db->prepare("
		UPDATE lessons 
		SET title = :title,
			content = :content,
			video_embed = :video_embed,
			subject = :subject,
			date_created = NOW()
		WHERE id = :id
	");

	$update_lesson->execute([
		'id' => $lesson_id,
		'title' => $title,
		'content' => $content,
		'subject' => $subject,
		'video_embed' => $video_embed
	]);

	$_SESSION['lessonupdated'] = "Lesson Titled: '" . $title . "' was updated.";
	Redirect::to('../dashboard.php');
}else{
	echo "error updating data";
}

?>