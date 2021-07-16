<?php
	$conn = new mysqli('localhost', 'root', '', 'resto') or die(mysqli_error());
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
?>