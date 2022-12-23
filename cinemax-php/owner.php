<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="menu.css">
	<title>Owners</title>
	<?php
	if(!isset($_SESSION['username'])){
		echo("<script>location.href=index.php</script>");
	}?>

<style >	
</style>
</head>
<body>
	<?php 
	 //The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.
  	if(!isset($_SESSION['username'])){
    	 echo("<script>location.href = 'index.php';</script>");
  	}
  	$username = $_SESSION['username'];
    $role=$_SESSION['role'];

	if($_SESSION['role']!='CINEMAOWNER'){
		echo("<script>window.alert('You do not have permission for this page!'); window.location.href='welcome.php';</script>");
	}
	?>

	<div id="div1"><?php echo "Welcome to cinema owners page"?></div>

	<div id="divExt"><b><?php echo nl2br("$username\n$role");?></b></div>

	<div style="margin-top: 200px" class="topnav">
	  <a href="addMovie.php">Add Movie</a>
	  <a style="margin-left: 240px" href="movieList.php">List of your Movies</a>
	  <a style="margin-left: 240px" href="deleteMovie.php">Delete Movie</a>
	  <a style="margin-left: 240px" href="editMovie.php">Edit Movie</a>
	</div>

	<button onclick="goBack()"><b>Go Back</b></button>
	<script>
	  function goBack() {
	  window.location.href='welcome.php';
	}
	</script>

</body>
</html>