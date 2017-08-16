<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('index.php');
	die();
}

?>

<h2>Change Password</h2>
<hr>

<div class="col-sm-5 col-sm-offset-3">
	<form class="well" action="changePassword.php" method="post" role="form">
		<div class="form-group">
			<input type="password" name="password_current" id="password" tabindex="2" class="form-control" required="true" minlength="6" maxlength="24" placeholder="Current Password">
		</div>
		<div class="form-group">
			<input type="password" name="password_new" id="password" tabindex="2" class="form-control" required="true" minlength="6" maxlength="24" placeholder="New Password">
		</div>
		<div class="form-group">
			<input type="password" name="password_new_again" id="confirm-password" tabindex="2" required="true" minlength="6" maxlength="24" class="form-control" placeholder="Confirm New Password">
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