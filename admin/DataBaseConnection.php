<?php
	$conn = new mysqli("localhost", "root", "", "dig_exipo_db");
	
	if($conn === false){
		die("connection failed." . $conn->connect_error);
	}
?>
