<?php
	require_once 'core/init.php';
	require_once 'classes/connection.php';
	$user = new user();

	if(!$user->isLoggedIn()){
    Redirect::to('index.php');
    die();
  	}

  	$user_id = $user->data()->id;

	// db
	$lessons = $db->query("SELECT * FROM lessons
    WHERE user_id = '$user_id' ORDER BY date_created DESC ")->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>My Lessons</h1>
<hr>

<div id="lesson_functions">
	<div class="col-sm-10">
    <?php
      if(Session::exists('lessonadded')) {
      echo '<div id="flash-message" class="alert alert-success">
        <strong>Success!</strong> ' . Session::flash('lessonadded') . '
      </div>';
      }

      if(Session::exists('lessonupdated')) {
      echo '<div id="flash-message" class="alert alert-success">
        <strong>Success!</strong> ' . Session::flash('lessonupdated') . '
      </div>';
      }

       if(Session::exists('lessondeleted')) {
      echo '<div id="flash-message" class="alert alert-success">
        <strong>Success!</strong> ' . Session::flash('lessondeleted') . '
      </div>';
      }
    ?>
	</div>
	<div class="col-sm-2">
		<a class="btn btn-success" id="create_lesson" href="#" data-target="create_lesson">
		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Create a lesson
		</a>
	</div>
</div>

<?php require 'lessons/lessons_content.php'; ?>

<script type="text/javascript" src="tinymce/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/plugin/tinymce/init-tinymce.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    //set trigger and container variables
    var trigger = $('#lesson_functions a'),
        container = $('#content');

    //fire on click
    trigger.on('click', function(e){
      // set $this for re-use. Set target from data attribute
      var $this = $(this),
          target = $this.data('target');

      // Load target page into container
      container.load(target + '.php');

      //stop normal link behavior
      return false;
    });

    $("#flash-message").delay(5200).fadeOut(300);
    });
</script>
