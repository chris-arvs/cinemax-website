?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete a Movie</title>
	<link rel="stylesheet" type="text/css" href="form.css">
	<?php
	if(!isset($_SESSION['username'])){
		echo("<script>location.href=index.php</script>");
	}?>

</head>
<body>
	<div id="div1"><b><h1>Delete a Movie</h1><b></div>
	<div id="div3">
		<form name="deleteMovie" action="" method="post" autocomplete="on" target="_self">
	    	<label for="id"><b>ID:</b></label><br>
	    	<input type="text" id="id"  name="id" maxlength="20" required><br>
	    	<input type="submit" name = "delete" value="Delete">
	  	</form>
	</div>

	<button onclick="goBack()"><b>Go Back</b></button>
	<script>
	  function goBack() {
	  window.location.href='owner.php';
	}
	</script>

</body>
</html>

<?php session_start();?>
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

		$sql = "DELETE FROM movies WHERE id = '".$ID."' AND cinemaowner='".$_SESSION['username']."' ";
		if ($conn->query($sql) === TRUE) {
	    	echo ("<script> window.alert('Movie deleted successfully'); window.location.href='owner.php';</script>");
		}
		else{
	    	echo ("<script> window.alert('Something went wrong!Please try again'); window.location.href='deleteMovie.php';</script>");
		}
	}
$conn->close();
?>