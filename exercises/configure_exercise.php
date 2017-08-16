<?php
	require_once '../classes/connection.php';
	require_once 'getQuestionID.php';
	$exercise_id = $_GET['exercise_id'];

	$exercise = $db->query("SELECT * FROM exercises
    WHERE id = '$exercise_id' ")->fetch(PDO::FETCH_ASSOC);

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
    .question_content {
      margin-right: 250px;
      margin-top: 40px;
      margin-bottom: 20px;
    }

		.question_number{
			background: #00e600;
			padding: 3px;
			color: #fff;
			border: 1px solid #00e600;
			border-radius: 3px;
		}
  </style>

</head>
<body>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<h2>Configure Exercise - <b><?php echo $exercise['title']; ?></b></h2>
			<hr>
		</div>

    <div class="row">
      <form class="form-horizontal" action="" method="post" role="form">
      <fieldset>

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
        <input id="title" name="title" type="text" placeholder="title"
        class="form-control input-md" value="<?php echo $exercise['title'] ?>" required="">
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
      	<div class="col-md-4">

      	</div>
        <div class="col-md-2">
          <button id="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
        </div>
      </div>

      </fieldset>
      </form>
    </div>

		<!-- VIEW ALL QUESTIONS -->

		<div class="row">
			<h2>Questions</h2>
			<hr>

			<div class="col-sm-10"></div>
			<div class="col-sm-2">
				<a data-toggle="modal" href="#myModal" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span>    Reset All</a>
			</div>
		</div>

		<!-- RESET ALL QUESTIONS MODAL -->
	<div id="myModal" class="modal fade in">
			<div class="modal-dialog">
					<div class="modal-content">

							<div class="modal-header">
									<a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
									<h3 class="modal-title">
									<span class="glyphicon glyphicon-erase"></span>
										 Remove All Questions</h3>
							</div>
							<div class="modal-body">
								<h4>Are you sure you want to delete all of the questions with this exercise?</h4>
							</div>
							<div class="modal-footer">
									<div class="btn-group">
											<button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
											<a href="exercises/reset_questions.php?exercise_id=<?php echo $exercise['id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Delete</a>
									</div>
							</div>
					</div><!-- /.modal-content -->
			</div><!-- /.modal-dalog -->
	</div><!-- /.modal -->

	<?php include 'view_questions.php' ?>

		<!-- add question -->

    <div class="row">
      <h2>Add Question</h2>
			<hr>
    </div>

		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-2">
				<h4>Question Number: </h4>
			</div>
			<div class="col-sm-1"><h4>
				<span class="question_number">
				<?php
					$number = (int) getQuestionID($db, $exercise['id']) + 1;
					echo $number;
				 ?>
				 </span></h4>
			</div>
		</div>

		<br />
    <div class="row" id="type_question">
			<div class="col-sm-2"></div>
      <div class="col-sm-2">
        <h4>Type of question: </h4>
      </div>
      <div class="col-sm-2">
        <!-- Multiple Choice -->
        <a class="btn btn-primary btn-block" href="#" data-target="multiple_choice">Multiple Choice</a>
      </div>
      <div class="col-sm-2">
        <!-- True or False -->
        <a class="btn btn-default btn-block" href="#" data-target="true_false">True/False</a>
      </div>
      <div class="col-sm-2">
        <!-- Fill in the Blanks -->
        <a class="btn btn-info btn-block" href="#" data-target="fill_blanks">Fill in the Blanks</a>
      </div>
    </div>

    <form class="form-horizontal" method="post" role="form" action="add_question.php">
      <input type="hidden" name="exercise_id" value="<?php echo $exercise['id']; ?>" />
      <input type="hidden" name="question_id" />
      <div id="content" class="question_content"></div>
    </form>

  </div>
</div>




<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  //set trigger and container variables
  var trigger = $('#type_question div a'),
      container = $('#content');

  //fire on click
  trigger.on('click', function(e){
    // set $this for re-use. Set target from data attribute
    var $this = $(this),
        target = $this.data('target');

    //remove recent class and add class active to which is clicked
    // $('#nav ul li.active').removeClass('active');
    // var $parent = $this.parent();
    // $parent.addClass('active');
    e.preventDefault();

    // Load target page into container
    container.load('../questions/' + target + '.php');

    //stop normal link behavior
    return false;
  });
  });
// });

$("#flash-message").delay(3200).fadeOut(300);

</script>

</body>
</html>
