<?php
function getQuestionID($db, $exercise_id){
  $exercise = $db->prepare("
    SELECT * FROM questions
    WHERE exer_id = :exer_id
  ");

  $exercise->execute(['exer_id' => $exercise_id]);
  $exercise = $exercise->fetchAll(PDO::FETCH_ASSOC);
  $count = count($exercise);

  return $count;
}
 ?>
