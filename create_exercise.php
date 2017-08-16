<?php
	require_once 'core/init.php';
	require_once 'classes/connection.php';
	$user = new User();

	if(!$user->isLoggedIn()){
    Redirect::to('index.php');
    die();
  	}

	$user_id = $user->data()->id;

	$lessons = $db->query("SELECT * FROM lessons
  WHERE user_id = '$user_id'")->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Create Exercise</h2>
<hr>

<form class="form-horizontal" action="exercises/add_exercise.php?user_id=<?php echo $user_id; ?>" method="post" role="form">
<fieldset>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Select a lesson:</label>
  <div class="col-md-4">
		<div class="select-style">
			<select name="lesson_id">
				<?php foreach ($lessons as $lesson): ?>
				<option value="<?php echo $lesson['id']; ?>"><?php echo $lesson['title']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="status">Status</label>
  <div class="col-md-4">
    <label class="radio-inline" for="status-0">
      <input type="radio" name="status" id="status-0" value="active" checked="checked">
      Active
    </label>
    <label class="radio-inline" for="status-1">
      <input type="radio" name="status" id="status-1" value="inactive">
      Inactive
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Title of the exercise:</label>
  <div class="col-md-6">
  <input id="title" name="title" type="text" placeholder="title" class="form-control input-md" required="">
	<span class="help-block">You can add questions after creating this exercise.</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
	<div class="col-md-4">

	</div>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-success btn-block">Create exercise</button>
  </div>
</div>

</fieldset>
</form>
