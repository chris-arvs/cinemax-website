<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>

	<link rel="stylesheet" type="text/css" href="menu.css">
	
	<?php
	if(!isset($_SESSION['username'])){
		echo("<script>location.href=index.php</script>");
	}?>

</head>
<body>
	<?php 
	//The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.
  	if(!isset($_SESSION['username'])){
    	 echo("<script>location.href = 'index.php';</script>");
  	}
  	$username = $_SESSION['username'];
    $role=$_SESSION['role'];

	if($_SESSION['role']!='ADMIN'){
		echo("<script>window.alert('You do not have permission for this page!'); window.location.href='welcome.php';</script>");
	}
	?>
	<div id="div1"><?php echo "Welcome to admins page"?></div>
	<div id="divExt"><b><?php echo nl2br("$username\n$role");?></b></div>
	<div style="margin-top: 200px" class="topnav">
	  <a href="usersList.php">List of Users</a>
	  <a style="margin-left: 600px;"href="deleteUser.php">Delete a User</a>
	  <a style="margin-left: 400px;"href="editUser.php">Edit User</a>
	</div>
	<button onclick="goBack()"><b>Go Back</b></button>
	<script>
	  function goBack() {
	  window.location.href='welcome.php';
	}
	</script>
</body>
</html>