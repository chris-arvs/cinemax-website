<?php session_start();?>
<!DOCTYPE html>
<html>	
<head>
	<title>Movies</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
	<?php
	if(!isset($_SESSION['username'])){
		echo("<script>location.href=index.php</script>");
	}?>

</head>
<body>
	<?php 
		if(!isset($_SESSION['username'])){
			echo("<script>location.href ='index.php';</script>");
		}
		$username = $_SESSION['username'];
    	$role=$_SESSION['role'];

    	if($_SESSION['role']!='USER'){
			echo("<script>window.alert('You do not have permission for this page!'); window.location.href='welcome.php';</script>");
		}
	?>
	<div id="div4"><?php echo "Welcome to Movies page"?></div>
	<div id="divExt"><b><?php echo nl2br("$username\n$role");?></b></div>
	<div style="margin-top: 200px" class="topnav">
	  <a href="MovieListForUsers.php">List of Movies</a>
	  <a style="margin-left: 400px" href="searchMovie.php">Search a Movie</a>
	  <a style="margin-left: 400px" href="addInFavourite.php">Add in Favourite</a>
	  <a style="margin-left: 400px" href="FavouriteMovies.php">My Favorite Movies List</a>
	</div>
	<button onclick="goBack()"><b>Go Back</b></button>
	<script>
	 function goBack() {
	 window.location.href='welcome.php';
	}
	</script>



</body>
</html>