<div class="container" id="login-title">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h1>Welcome to Worktext!</h1>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<a href="#" class="active" id="login-form-link">Login</a>
						</div>
						<div class="col-xs-6">
							<a href="#" id="register-form-link">Register</a>
						</div>
					</div>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form id="login-form" action="login.php" method="post" role="form" style="display: block;">
								<?php
									if(Session::exists('registered')) {
											echo '<div id="flash-message" class="alert alert-success">
											<strong>Success!</strong> ' . Session::flash('registered') . '
										</div>';
									}

									if(Session::exists('emailexists')) {
											echo '<div id="flash-message" class="alert alert-danger">
											<strong>Error!</strong> ' . Session::flash('emailexists') . '
										</div>';
									}

									if(Session::exists('passwordnotmatch')) {
											echo '<div id="flash-message" class="alert alert-danger">
											<strong>Error!</strong> ' . Session::flash('passwordnotmatch') . '
										</div>';
									}

									if(Session::exists('loginerror')) {
											echo '<div id="flash-message" class="alert alert-danger">
											<strong>Login failed.</strong> ' . Session::flash('loginerror') . '
										</div>';
									}
								?>
								<div class="form-group">
									<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" required="true" value="">
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="true">
								</div>
								<div class="form-group text-center">
									<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
									<label for="remember"> Remember Me</label>
								</div>

								<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-12">
											<div class="text-center">
												<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
											</div>
										</div>
									</div>
								</div>
							</form>
							<form id="register-form" action="register.php" method="post" role="form" 
							style="display: none;">
							<div class="form-group">
								<input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First name" value="<?php echo escape(Input::get('firstname')); ?>">
							</div>
							<div class="form-group">
								<input type="text" name="lastname" id="lastname" tabindex="1" class="form-control" placeholder="Last name" value="<?php echo escape(Input::get('lastname')); ?>">
							</div>

							<div class="form-group">
								<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<input type="password" name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password">
							</div>

							<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>