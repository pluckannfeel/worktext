<?php
require_once 'core/init.php';
$user = new user();
if($user->isLoggedIn()){
    Redirect::to('dashboard.php');
    die();
  }

require "templates/header.php";
?>

<body>

	<?php
	require "templates/base.php";
	?>

</body>

<?php
require "templates/footer.php";
?>