
<?php
require_once '../classes/connection.php';
require_once '../functions/sanitize.php';

if(empty($_GET['lesson'])){
	echo '<h3 class="text text-danger">Error 404: Page not found.</h3>';
	die();
}else{
	$lesson_id = $_GET['lesson'];

	$lesson = $db->prepare("
		SELECT * FROM lessons
		WHERE id = :lesson_id
		LIMIT 1
	");

	$lesson->execute(['lesson_id' => $lesson_id]);
	$lesson = $lesson->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Work Text</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://image.flaticon.com/icons/png/128/139/139313.png">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="../css/lessons.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,400italic,600italic,700' rel='stylesheet' type='text/css'>

  <style>
  	#view-lesson-title h2{ color: #8740a5; }
	#view-lesson-title span{ color: #000; font-size: 14pt; }
	.video-container { text-align: center;}
	.container { margin-bottom: 20px; }
  </style>

</head>
<body>

	<div class="container-fluid">
		<div class="container">
			<div id="view-lesson-title" class="row">
				<h2><strong><?php echo escape($lesson['title']); ?></strong></h2>
				<span>Created on <?php echo date('l, dS \o\f F Y', strtotime($lesson['date_created'])); ?></span>
				<hr>
			</div>

			<div id="content" class="row">
				<?php echo $lesson['content'];
				 ?>
			</div>

			<div class="row">
				<h2> Video </h2>
				<hr>
			</div>
			
			<div class="row video-container">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="embed-responsive embed-responsive-16by9 ">
					<?php echo $lesson['video_embed']; ?>
				</div>
				</div>
				<div class="col-sm-3"></div>
			</div>

			<hr>

		</div>
	</div>

<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("iframe").addClass("embed-responsive-item");
	});
</script>

</body>
</html>