<div>
<?php if (empty($lessons)): ?>
	<br><br><h3>&nbsp;&nbsp;&nbsp;&nbsp;You haven't made a lesson yet.</h3>
<?php else: ?>
	<div class="col-sm-11">
	<table id="lessons-table" class="table table-responsive table-hover table-bordered">
		<thead>
	    <tr>
	      <th>ID</th>
	      <th>Title</th>
	      <th>Subject</th>
	      <th>Date Created</th>
	      <th>Actions</th>
	    </tr>
	  </thead>
	  <tbody>
	  <?php $x = 1; ?>
	  <?php foreach ($lessons as $lesson): ?>
	  		<tr>
	  			<th scope="row"><?php echo $x++; ?></th>
	  			<td>

	  			<?php echo $lesson['title']; ?></a>
	  			</td>

	  			<td><?php echo $lesson['subject']; ?></td>

	  			<td><?php echo date('l, F dS, Y \a\t h:i A', strtotime($lesson['date_created'])); ?></td>
	  			<td>
	  			<a href="lessons/view_lesson.php?lesson=<?php echo $lesson['id']; ?>"
	  			target="_blank" class="btn btn-sm btn-primary">
	  			<span class="glyphicon glyphicon-eye-open"></span>  View</a>&nbsp;&nbsp;&nbsp;

	  			<a href="lessons/edit_lesson.php?lesson=<?php echo $lesson['id']; ?>" target="_blank" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span>  Edit</a>&nbsp;&nbsp;&nbsp;

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
				                   Delete Lesson</h3>
				            </div>
				            <div class="modal-body">
				            	<h4>Are you sure you want to delete this data?</h4>
				            </div>
				            <div class="modal-footer">
				                <div class="btn-group">
				                    <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				                    <a href="lessons/delete_lesson.php?lesson_id=<?php echo $lesson['id']; ?>&title=<?php echo $lesson['title']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Delete</a>
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
