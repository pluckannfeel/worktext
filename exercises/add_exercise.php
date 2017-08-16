<?php
require_once '../classes/connection.php';
require_once '../classes/Redirect.php';
session_start();

if(!empty($_POST)){
  $title = $_POST['title'];
  $date = date("Y-m-d");
  $status = $_POST['status'];
  $lesson_id = $_POST['lesson_id'];
  $user_id = $_GET['user_id'];

  $insert = $db->prepare("
    INSERT INTO exercises (title, date_created, status, lesson_id, user_id)
    VALUES (:title, :date, :status, :lesson_id, :user_id)
  ");

  $insert->execute([
    'title' => $title,
    'date' => $date,
    'status' => $status,
    'lesson_id' => $lesson_id,
    'user_id' => $user_id
  ]);

  $_SESSION['exerciseadded'] = 'Exercise Created.';
  Redirect::to('../dashboard.php');
}else{
  echo "error inserting data";
}
