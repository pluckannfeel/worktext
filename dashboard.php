<?php
  require_once 'core/init.php';
  $user = new user();
  // && !Cookie::exists(Config::get('remember/cookie_name'))
  if(!$user->isLoggedIn()){
    Redirect::to('index.php');
    die();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Work Text</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://image.flaticon.com/icons/png/128/139/139313.png">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="css/lessons.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,400italic,600italic,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php
    if($user->hasPermission('admin')){
      echo "You are an administrator.";
    }
    else if($user->hasPermission('moderator')){
      echo "you are a moderator.";
    }
    ?>

  <div id="header">

    <div class="logo">
      <a href="#">Work<span>Text</span></a>
    </div>

    <div class="dropdown">
      <button class="dropbtn">
        <?php
          $firstname = $user->data()->firstname;
          $lastname = $user->data()->lastname;
          echo $firstname . " " . $lastname;
        ?>
      </button>
      <div class="dropdown-content">
        <a href="#">Settings</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>

  </div>


  <a class="mobile">MENU</a>


  <div id="container">

    <div class="sidebar">
      <nav id="nav">
        <ul>
          <li class="active"><a href="#" data-target="dashboard_content">Dashboard</a></li>
          <li><a href="#" data-target="lessons">Lessons</a></li>
          <li><a href="#" data-target="exercises">Exercises</a></li>
          <li><a href="#" data-target="scoreboard">Scoreboard</a></li>
          <li><a href="#" data-target="activities">Activities</a></li>
          <li><a href="#" data-target="account">Account</a></li>
        </ul>
      </nav>
    </div>

    <div id="content" class="content">
      <?php
      include "dashboard_content.php";
      ?>
    </div>


  </div><!-- #container -->

  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="tinymce/plugin/tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="tinymce/plugin/tinymce/init-tinymce.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

  <script type="text/javascript">

    $(document).ready(function(){
     $("a.mobile").click(function(){
      $(".sidebar").slideToggle('fast');
    });

     window.onresize = function(event) {
      if($(window).width() > 480){
        $(".sidebar").show();
      }
    };

    $(document).ready(function(){
    //set trigger and container variables
    var trigger = $('#nav ul li a'),
        container = $('#content');

    //fire on click
    trigger.on('click', function(e){
      // set $this for re-use. Set target from data attribute
      var $this = $(this),
          target = $this.data('target');

      //remove recent class and add class active to which is clicked
      $('#nav ul li.active').removeClass('active');
      var $parent = $this.parent();
      $parent.addClass('active');
      e.preventDefault();

      // Load target page into container
      container.load(target + '.php');

      //stop normal link behavior
      return false;
    });

    });

  });

  $("#flash-message").delay(3200).fadeOut(300);

</script>

</body>
</html>
