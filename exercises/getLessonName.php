<?php
function getLessonName($db, $lesson_id){
	$lesson = $db->prepare("
		SELECT title FROM lessons
		WHERE id = :lesson_id
		LIMIT 1
	");

	$lesson->execute(['lesson_id' => $lesson_id]);
	$lesson = $lesson->fetch(PDO::FETCH_ASSOC);

  return $lesson['title'];
}
?>
