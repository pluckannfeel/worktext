<?php
	try {
	$username = 'root';
	$password = '';
	$servername = 'localhost';
	$dbname = 'capstone';

	// $username = 'bsitcaps_swt';
	// $password = '&^T73]p#;x.w';
	// $servername = 'localhost';
	// $dbname = 'bsitcaps_swtdb';

	$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
?>