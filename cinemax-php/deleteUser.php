?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete a User</title>
	<link rel="stylesheet" type="text/css" href="form.css">
	<?php
	if(!isset($_SESSION['username'])){
		echo("<script>location.href=index.php</script>");
	}?>

</head>
<body>
	<div id="div1"><b><h1>Delete a User</h1><b></div>
	<div id="div3">
		<form name="deleteUser" action="" method="post" autocomplete="on" target="_self">
	    	<label for="id"><b>ID:</b></label><br>
	    	<input type="text" id="id"  name="id" maxlength="20" required><br>
	    	<input type="submit" name="delete" value="Delete">
	  	</form>
	</div>

	<button onclick="goBack()"><b>Go Back</b></button>
	<script>
	  function goBack() {
	  window.location.href='admin.php';
	}
	</script>

</body>
</html>

<?php 
//Connect to the db
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cinemaxdb";
	$conn = mysqli_connect($servername,$username,$password,$dbname);

//Check connection
	if(!$conn){
	die("connection failed: " . mysqli_connect_error());
	}

	if(isset($_POST['delete'])){
	$ID = $_POST['id'];
	$sql = "DELETE FROM users WHERE (id ='".$ID."')";
	
		if ($conn->query($sql) === TRUE) {
	    	echo ("<script>window.alert('User deleted successfully'); window.location.href='admin.php';</script>");
	    }
	    else{
	    	echo ("<script>window.alert('Something went wrong!Please try again'); window.location.href='deleteUser.php';</script>");
		}
	}
	$conn->close();
?>