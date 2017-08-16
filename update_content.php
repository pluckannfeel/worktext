<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('index.php');
	die();
}

?>

<h2>Update Information</h2>
<hr>

<div class="col-sm-5 col-sm-offset-3">
	<form class="well" action="updateAccount.php" method="post" role="form">
		<div class="form-group">
			<input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First name"
			required="true" minlength="2" maxlength="50" value="<?php echo escape($user->data()->firstname); ?>">
		</div>
		<div class="form-group">
			<input type="text" name="lastname" id="lastname" tabindex="1" class="form-control" placeholder="Last name" 
			required="true" minlength="2" maxlength="50" value="<?php echo escape($user->data()->lastname); ?>">
		</div>

		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

		<div class="form-group">
			<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<input type="submit" name="submit" class="btn btn-primary btn-block" id="update_account" href="#" data-target="updateAccount" value="Update">
			</div>
			<div class="col-md-3"></div>
			</div>
		</div>
	</form>
</div>