<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Search for a Movie</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
	<?php
	if(!isset($_SESSION['username'])){
		echo("<script>location.href=index.php</script>");
	}?>
</head>
<body>
	<div id="div1"><b>Search for a Movie<b></div>
	<div id="div3">
	<div style="margin-top: 200px" class="topnav">
	  <a href="searchByTitle.php">Search by Title</a>
	  <a style="margin-left: 240px" href="searchByOwner.php">Search by Owner</a>
	  <a style="margin-left: 240px" href="searchByCategory.php">Search by Category</a>
	  <a style="margin-left: 240px" href="searchByStartingDate.php">Search by Starting Date</a>
	</div>
	</div>

	<button onclick="goBack()"><b>Go Back</b></button>
	<script>
	  function goBack() {
	  window.location.href='movies.php';
	}
	</script>
</body>
</html>