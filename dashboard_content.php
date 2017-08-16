<?php
	require_once 'core/init.php';
	require_once 'classes/connection.php';

	$user = new user();

	if(!$user->isLoggedIn()){
    Redirect::to('index.php');
    die();
  	}

  	$email = $user->data()->email;

  	$invitation_code = $db->query("SELECT code FROM users WHERE email = '$email';")->fetchAll(PDO::FETCH_ASSOC);
 ?>

<div class="col-sm-9">
	<h1>Dashboard</h1>
	<hr>
</div>
<div class="col-sm-3">
	<?php foreach ($invitation_code as $invitation): ?>
		<div id="box">
	      <div class="box-top"><h5>Show this code to your students to give access from your lessons</h5></div>
	      <div class="box-panel"><h4><kbd><?php echo $invitation['code']; ?><kbd></h4></div>
	    </div>
	<?php endforeach; ?>
</div>

<hr>
<h3>Good day!</h3>

<div id="box">
 <div class="box-top"><b>This is Science Worktext's Content Management System. </b></div>
 <div class="box-panel"><b>Science worktext developed to enhance the learning of the students about science. This application
 will have an interactive quiz to test the knowledge of students. Also, an ideal app for the teacher to simply create
 their lessons. Moreover, This app features tools such as including videos and images which expands the learning of every individual.</b></div>
</div>

<div id="box">
 <div class="box-top"><b>Updates</b></div>
 <div class="box-panel"><b>- No updates posted yet.</b></div>
</div>

<?php
	$quote_num = rand(1, 5);
	if($quote_num == 1)
		$quote = "<b>The Science of today is the technology tomorrow.<br> - Edward Teller<b>";
	else if($quote_num == 2)
		$quote = "<b>Science is the great antidote to the poison of enthusiasm and superstition.<br> - Adam Smith</b>";
	else if($quote_num == 3)
		$quote = "<b>Science without religion is lame, religion without science is blind.<br> - Albert Einstein</b>";
	else if($quote_num == 4){
		$quote = "<b>The most beautiful thing we can experience is the mysterious. It is the source of all true art and science. </br> - Albert Einstein</b>";
	}else if($quote_num == 5){
		$quote = "<b>The distance between insanity and genius is measure only by success. <br> - Bruce Feirstein</b>";
	}
?>

<div id="box">
 <div class="box-top"><b>Quotes</b></div>
 <div class="box-panel">
 	<?php echo $quote; ?>
 </div>
</div>
