<?php
	require_once '../classes/connection.php';
	$lesson_id = $_GET['lesson'];

	$lessons = $db->query("SELECT * FROM lessons
    WHERE id = '$lesson_id'")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Work Text</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="../css/lessons.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,400italic,600italic,700' rel='stylesheet' type='text/css'>

  <style>

  </style>

</head>
<body>

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<h1>Edit Lesson</h1>
				<hr>
			</div>

			<div class="row">
				<?php foreach ($lessons as $lesson): ?>
				<form action="process_edit_lesson.php?lesson_id=<?php echo $lesson['id']; ?>" method="post" role="form">
		    		<div class="form-group">
		    		<label for="content">Title:</label>
		    		<input type="text" name="title" id="title" tabindex="2" class="form-control" required="true"
		    		maxlength="24" placeholder="Title" value="<?php echo $lesson['title']; ?>">
		    		</div>

		    		<div class="form-group">
						<label for="content">Content:</label>
						<textarea id="content" name="content" class="tinymce" placeholder="Content" id="comment">
							<?php echo $lesson['content']; ?>
						</textarea>
					</div>

					<div class="form-group">
						<label for="content">Copy Video Embed Code: e.g (youtube, vimeo, dailymotion, etc.)</label>
						<input type="text" name="video_embed" id="video_embed" tabindex="2" class="form-control" placeholder="Video Embed Code" value='<?php echo $lesson['video_embed']; ?>'>
					</div>

					<div class="form-group">
						<label for="content">Subject of lesson e.g (Science, Mathematics, English)</label>
						<input type="text" name="subject" id="subject" tabindex="2" class="form-control" required="true" placeholder="Subject" value='<?php echo $lesson['subject']; ?>'>
					</div>

					<div class="form-group">
						<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<input type="submit" name="submit" class="btn btn-primary btn-block" id="update_account" href="#" value="Save Changes">
						</div>
						<div class="col-md-4"></div>
						</div>
					</div>
				</form>
				<?php endforeach; ?>
			</div>

		</div>
	</div>

<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../tinymce/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../tinymce/plugin/tinymce/init-tinymce.js"></script>
<script type="text/javascript">

</script>

</body>
</html>
