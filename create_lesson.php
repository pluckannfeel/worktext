<?php
	require_once 'classes/connection.php';
	require_once 'core/init.php';
	$user = new User();

	$user_id = $user->data()->id;

	// db
?>
<h2>Create Lesson</h2>
<hr>

<form class="" action="lessons/add_lesson.php?user_id=<?php echo $user_id; ?>" method="post" role="form">
	<div class="form-group">
		<label for="content">Title:</label>
		<input type="text" name="title" id="title" tabindex="2" class="form-control" required="true"
		maxlength="24" placeholder="Title">
	</div>

	<div class="form-group">
		<label for="content">Content:</label>
		<textarea id="content" name="content" class="tinymce" placeholder="Content" id="comment"></textarea>
	</div>

	<div class="form-group">
		<label for="content">Copy video embed code: e.g (youtube, vimeo, dailymotion, etc.)</label>
		<input type="text" name="video_embed" id="video_embed" tabindex="2" class="form-control" placeholder="Video Embed Code">
	</div>

	<div class="form-group">
		<label for="content">Subject of lesson e.g (Science, Mathematics, English)</label>
		<input type="text" name="subject" id="subject" tabindex="2" class="form-control" required="true" placeholder="Subject">
	</div>

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

	<div class="form-group">
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<input type="submit" name="submit" class="btn btn-primary btn-block" id="update_account" href="#" value="Create">
		</div>
		<div class="col-md-4"></div>
		</div>
	</div>
</form>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="tinymce/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/plugin/tinymce/init-tinymce.js"></script>
