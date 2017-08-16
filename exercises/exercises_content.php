<div>
<?php
	require_once './classes/connection.php';
	require_once 'getLessonName.php';
?>

<?php if (empty($exercises)): ?>
	<br><br><h3>&nbsp;&nbsp;&nbsp;&nbsp;You haven't made exercises to a lesson yet.</h3>
<?php else: ?>
	<br /><br /><br />
	<div class="col-sm-11">
	<table id="lessons-table" class="table table-responsive table-hover table-bordered">
		<thead>
	    <tr>
	      <th>ID</th>
				<th>Lesson</th>
	      <th>Title</th>
	      <th>Date Created</th>
				<th>Status</th>
	      <th>Actions</th>
	    </tr>
	  </thead>
	  <tbody>
	  <?php $x = 1; ?>
	  <?php foreach ($exercises as $exercise): ?>
  		<tr>
				<!-- COLUMN ID -->
  			<th scope="row"><?php echo $x++; ?></th>

				<!-- LESSON TITLE -->
				<td><?php echo getLessonName($db, $exercise['lesson_id']) ?></td>

				<!-- EXERCISE TITLE -->
				<td><?php echo $exercise['title']; ?></td>

				<!-- DATE -->
  			<td><?php echo date('l, F dS, Y', strtotime($exercise['date_created'])); ?></td>

				<!-- STATUS -->
				<td><span class="status-<?php echo $exercise['status']; ?>"><?php echo ucfirst($exercise['status']); ?></span></td>

				<!-- CONFIGURE EXERCISE -->
  			<td>
  			<a href="exercises/configure_exercise.php?exercise_id=<?php echo $exercise['id']; ?>" target="_blank" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span>  Configure</a>&nbsp;&nbsp;&nbsp;

  			<a data-toggle="modal" href="#myModal" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span>  Delete</a>
  			</td>

  			<!-- DELETE LESSON -->
			<div id="myModal" class="modal fade in">
			    <div class="modal-dialog">
			        <div class="modal-content">

			            <div class="modal-header">
			                <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
			                <h3 class="modal-title">
			                <span class="glyphicon glyphicon-erase"></span>
			                   Delete Exercise</h3>
			            </div>
			            <div class="modal-body">
			            	<h4>Are you sure you want to delete this data?</h4>
			            </div>
			            <div class="modal-footer">
			                <div class="btn-group">
			                    <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
			                    <a href="exercises/delete_exercise.php?exercise_id=<?php echo $exercise['id']; ?>&title=<?php echo $exercise['title']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Delete</a>
			                </div>
			            </div>
			        </div><!-- /.modal-content -->
			    </div><!-- /.modal-dalog -->
			</div><!-- /.modal -->

  		</tr>
	    <?php endforeach; ?>
	  </tbody>
	</table>
	</div>
<?php endif; ?>
</div>
