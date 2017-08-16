<?php
  // $data = array();
  require_once '../classes/connection.php';
  require_once '../classes/Redirect.php';
  require_once 'getQuestionID.php';
  session_start();

  if(!empty($_POST)){
    $exercise_id = $_POST['exercise_id'];
    $type = $_POST['type'];
    $question_id = getQuestionID($db, $_POST['exercise_id']) + 1;

    //question
    $question_title = $_POST['question'];

    //answer(s) categorized through type of question
    if($type == "mc"){
      //for multiple choice
      $answer_a = (isset($_POST['choice_a']) ? $_POST['choice_a'] : 'not set');
      $answer_b = (isset($_POST['choice_b']) ? $_POST['choice_b'] : 'not set');
      $answer_c = (isset($_POST['choice_c']) ? $_POST['choice_c'] : 'not set');
      $answer_d = (isset($_POST['choice_d']) ? $_POST['choice_d'] : 'not set');
      $isCorrect = (isset($_POST['isCorrect']) ? $_POST['isCorrect'] : 'not set');

    }else if($type == "fb"){
      //for fill the blanks
      $answer = (isset($_POST['answer']) ?  $_POST['answer'] : 'not set');
    }else if($type == "tf"){
      $answer = (isset($_POST['answer']) ?  $_POST['answer'] : 'not set');
    }


  }

 ?>
