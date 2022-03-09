<?php 
	// $servername = "remotemysql.com";
	// $username = "LvH4zm9Th1";
	// $password = "bawaQhdm6d";
	// $database = "LvH4zm9Th1";

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "nineplusdk";
	
	
	$con = new mysqli($servername, $username, $password, $database);

	
	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	} else {
		echo "";
	}
	
?>