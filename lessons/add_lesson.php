<?php
	require_once '../classes/connection.php';
	require_once '../classes/Redirect.php';
	session_start();

	if(!empty($_POST)){
		$user_id = $_GET['user_id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$video_embed = $_POST['video_embed'];
		$subject = $_POST['subject'];

		$insert = $db->prepare("
			INSERT INTO lessons (title, content, video_embed, subject, user_id)
			VALUES (:title, :content, :video_embed, :subject, :user_id)
		");

		$insert->execute([
			'title' => $title,
			'content' => $content,
			'video_embed' => $video_embed,
			'subject' => $subject,
			'user_id' => $user_id
		]);

		$_SESSION['lessonadded'] = 'Lesson Created.';
		Redirect::to('../dashboard.php');
	}else{
		echo "error inserting data";
	}
?>