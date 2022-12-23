<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Movie infos</title>
	<link rel="stylesheet" type="text/css" href="form.css">
	<?php
	if(!isset($_SESSION['username'])){
		echo("<script>location.href=index.php</script>");
	}?>
</head>
<body>
	<div id="div1"><b><h1>Update Movie infos</h1><b></div>
	<div id="div3">
	<form action="" method="POST" >
		<label for="id"><b>ID:</b></label><br>
		<input type="text" id="id"  name="id" maxlength="20" required><br>
		<label for="title"><b>Title:</b></label><br>
		<input type="text" id="title"  name="title" maxlength="20" ><br>
		<label for="start_date"><b>Start Date:</b></label><br>
		<input type="date" id="start_date"  name="start_date" maxlength="20" ><br>
		<label for="end_date"><b>End Date:</b></label><br>
		<input type="date" id="end_date"  name="end_date" maxlength="20" ><br>
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

  		<input type="submit" name="editMovie" value="Edit">
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

	if(isset($_POST['editMovie'])){
		$id=$_POST['id'];
		if(!empty($_POST['title'])){
			$newtitle = $_POST['title'];
			$sql = "UPDATE movies SET title='".$newtitle."' WHERE id='".$id."' ";
		    if($conn->query($sql) === FALSE) {
    			echo ("<script LANGUAGE='JavaScript'>
    				window.alert('Wrong id!Please try again');
    				window.location.href='editMovie.php';
    			  </script>");
			} 
		}
		if(!empty($_POST['start_date'])){
			$newStartDate = $_POST['start_date'];
			$sql = "UPDATE movies SET start_date ='".$newStartDate."' WHERE id='".$id."' ";
		    if($conn->query($sql) === FALSE) {
    			echo ("<script LANGUAGE='JavaScript'>
    				window.alert('Wrong id!Please try again');
    				window.location.href='editMovie.php';
    			  </script>");
			} 
		}

		if(!empty($_POST['end_date'])){
			$newEndDate = $_POST['end_date'];
			$sql = "UPDATE movies SET end_date ='".$newEndDate."' WHERE id='".$id."' ";
		    if($conn->query($sql) === FALSE) {
    			echo ("<script LANGUAGE='JavaScript'>
    				window.alert('Wrong id!Please try again');
    				window.location.href='editMovie.php';
    			  </script>");
			} 
		}

		if(!empty($_POST['category'])){
			$newCategory = $_POST['category'];
			$sql = "UPDATE movies SET category ='".$newCategory."' WHERE id='".$id."' ";
		    if($conn->query($sql) === FALSE) {
    			echo ("<script LANGUAGE='JavaScript'>
    					window.alert('Wrong id!Please try again');
    					window.location.href='editMovie.php';
    			  		</script>");
			} 
		}

		
		echo ("<script LANGUAGE='JavaScript'> window.alert('Movie infos updated sucessfully'); window.location.href='editMovie.php';</script>");
		
}
	$conn->close();
?>