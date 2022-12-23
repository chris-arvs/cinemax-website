<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Add a Movie in Favorite</title>
	<link rel="stylesheet" type="text/css" href="form.css">
	<?php
	if(!isset($_SESSION['username'])){
		echo("<script>location.href=index.php</script>");
	}?>

</head>
<body>
	<div id="div1"><b><h1>Add a Movie in Favourite</h1><b></div>
	<div id="div3">
		<form name="addInFavouriteMovie" action="" method="post" autocomplete="on" target="_self">
	    	<label for="id"><b>Give an ID to one of your favourite Movie:</b></label><br>
			<input type="text" id="id"  name="id" maxlength="20" required><br>
			<label for="user_id"><b>Give your ID:</b></label><br>
			<input type="text" id="user_id"  name="user_id" maxlength="20" required><br>
			<label for="movie_id"><b>Give MOVIE ID:</b></label><br>
			<input type="text" id="movie_id"  name="movie_id" maxlength="20" required><br>
			<input type="submit" name="addInFav" value="Add">
	  	</form>
	</div>

	<button onclick="goBack()"><b>Go Back</b></button>
	<script>
	  function goBack() {
	  window.location.href='movies.php';
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

	if(isset($_POST['addInFav'])){
		$ID = $_POST['id'];
		$USERID= $_POST['user_id'];
		$MOVIEID = $_POST['movie_id'];
		if($_SESSION['id']==$USERID){
			$sql1="SELECT id FROM movies WHERE id='".$MOVIEID."' ";
			$result = $conn->query($sql1);
			if($result->num_rows>0){
				$row = $result->fetch_assoc();
				if($row['id'] == $MOVIEID ){
					$sql = "INSERT INTO fav(id,user_id,movie_id) VALUES ('".$ID."','".$USERID."','".$MOVIEID."')";
					if ($conn->query($sql) === TRUE) {
			    		echo ("<script>
			    			window.alert('Movie added in favourites successfully');
			    			window.location.href='movies.php';
			    			</script>");
					}else {
			    		echo ("<script>
			    			window.alert('Something went wrong!Please try again');
			    			window.location.href='addInFavourite.php';
			    			</script>");
					}
				}else{
				echo ("<script>
		    			window.alert('There is no movie with this ID.Please try again');
		    			window.location.href='addInFavourite.php';
		    			</script>");
				}
		 	}else{
		 		echo ("<script>
		    			window.alert('There is no movie with this ID.Please try again');
		    			window.location.href='addInFavourite.php';
		    			</script>");
		 	}
		}else{
			echo ("<script>
		    		window.alert('Wrong ID!Give your ID!Please try again');
		    		window.location.href='addInFavourite.php';
		    		</script>");
		}

	}
		
		$conn->close();
?>