<?php
	require_once 'core/init.php';

	$user = new User();

	if(!$user->isLoggedIn()){
		Redirect::to('index.php');
		die();
	}

	$firstname = $user->data()->firstname;
	$lastname = $user->data()->lastname;
  $email = $user->data()->email;
  $joined = $user->data()->joined;

	if(Session::exists('updatedinfo')) {
    echo '<div id="flash-message" class="alert alert-success">
    	<strong>Success!</strong> ' . Session::flash('updatedinfo') . '
  	</div>';
  	}

  	if(Session::exists('changepassok')) {
    echo '<div id="flash-message" class="alert alert-success">
    	<strong>Success!</strong> ' . Session::flash('changepassok') . '
  	</div>';
  	}

  	if(Session::exists('changepasserror')) {
    echo '<div id="flash-message" class="alert alert-danger">
    	<strong>Oops!</strong> ' . Session::flash('changepasserror') . '
  	</div>';
  	}
?>



<h1> My Account </h1>
<hr>
	
<div id="account_functions">
	<div class="col-sm-8">
	</div>
	<div class="col-sm-2">
		<a class="btn btn-primary" id="update_account" href="#" data-target="update_content">Update Information</a>
	</div>
	<div class="col-sm-2">
		<a class="btn btn-warning" id="changepass_content" href="#" data-target="changepass_content">Change Password</a>
	</div>
</div>

<div class="row">
  <div id="account-info" class="col-sm-5">
  <h3><strong>First name<strong></h3>
  <hr>
  <h4><?php echo $firstname; ?></h4>
  <h3><strong>Last name<strong></h3>
  <hr>
  <h4><?php echo $lastname; ?></h4>
  </div>
  <div id="account-info" class="col-sm-5">
    <h3><strong>Email Address<strong></h3>
    <hr>
    <h4><?php echo $email; ?></h4>
    <h3><strong>Date joined<strong></h3>
    <hr>
    <h4><?php echo date('F dS, Y \a\t h:i A', strtotime($joined)); ?></h4>
  </div>
</div>



		

<script type="text/javascript">
$(document).ready(function(){
    //set trigger and container variables
    var trigger = $('#account_functions a'),
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