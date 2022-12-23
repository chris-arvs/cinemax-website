<?php session_start();?>
<!DOCTYPE html>
<html>	
<head>
	<title>Add Movies</title>
	<link rel="stylesheet" type="text/css" href="form.css">
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
	?>
	<div id="div1"><b><h1>Add Movie</h1><b></div>
	<div id="div3">
	<form name="myForm" action="" method="post" autocomplete="on">
    	<label for="id"><b>ID:</b></label><br>
		<input type="text" id="id"  name="Movie_id" maxlength="20" required><br>
		<label for="title"><b>Title:</b></label><br>
		<input type="text"id ="title" name="Movie_title" maxlength="20" required><br>
		<label for="start_date"><b>Start Date:</b></label><br>
		<input type="date" id="start_date" name="start_date" maxlength="20" required><br>
		<label for="end_date"><b>End Date:</b></label><br>
		<input type="date" id="end_date" name="end_date" maxlength="20" required><br>
		<label for="cinemaowner"><b>Cinema Owner:</b></label><br>
		<input type="text" id="cinemaowner" name="cinemaowner" maxlength="20" required><br>
		<label for="category"><b>Category:</b></label><br>
		<select id="category" name="category">
    		<option value="Drama">Drama</option>
    		<option value="Action">Action</option>
    		<option value="Sci-fi">Sci-fi</option>
    		<option value="Adventure">Adventure</option>
    		<option value="Comedy">Comedy</option>
    		<option value="Thriller">Thriller</option>
    		<option value="Romance">Romance</option>
    		<option value="Biography">Biography</option>
    		<option value="Documentary">Documentary</option>
    		<option value="Animation">Animation</option>
    		<option value="Family">Family</option>
    		<option value="History">History</option>
    		<option value="Horror">Horror</option>
    		<option value="Musical">Musical</option>
  		</select><br>
  		<input type="submit" name="Add" value="Add">
  </form>
</div>

<button style="border:2px solid black;color: white;background-color: red; width: 100px;height: 50px;position: absolute;bottom: 60px;left: 20px;" onclick="goBack()"><b>Go Back</b></button>
	<script>
	  function goBack() {
	  window.location.href='owner.php';
	}
	</script>

</body>

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

if(isset($_POST['Add'])){
	$MovieID = $_POST['Movie_id'];
	$Title= $_POST['Movie_title'];
	$StartDate = $_POST['start_date'];
	$EndDate = $_POST['end_date'];
	$CinemaOwner = $_POST['cinemaowner'];
	$Category = $_POST['category'];
	if($_SESSION['username']==$CinemaOwner){
		$sql = "INSERT INTO movies(id,title,start_date,end_date,cinemaowner,category) VALUES ('".$MovieID."','".$Title."','".$StartDate."','".$EndDate."','".$CinemaOwner."','".$Category."')";
		if ($conn->query($sql) === TRUE) {
	   	echo ("<script>
	    		window.alert('New movie inserted successfully');
	    		window.location.href='owner.php';
	    		</script>");
		}else {
	    echo ("<script>
	    		window.alert('Something went wrong!Please try again');
	    		window.location.href='addMovie.php';
	   			</script>");
		}
	}else
		echo ("<script>
	    		window.alert('Wrong cinemaowner name!Please try again');
	    		window.location.href='addMovie.php';
	   			</script>");
}

	$conn->close();
?>