<?php session_start();
	session_destroy();
	//The header() function sends a raw HTTP header to a client.
	header('Location: index.php');
	exit;
?>