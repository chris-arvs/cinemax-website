<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Movie List page</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
	<?php
	if(!isset($_SESSION['username'])){
		echo("<script>location.href=index.php</script>");
	}?>

	<style >
	table {border-collapse: separate;
    	   border-spacing: 0 15px;
    	   color:white;
    	   background-color: red;
    	   margin: auto;
    	   margin-top: 40px;
    	   border: solid white 3px;
    	   font-size: 100%;}

    th {background-color: green;
        color: black;}

    td{
        width: 150px;
        text-align: center;
        border: 1px solid black;
        padding: 5px;
      }

      tr{color:white;background-color: green;}
	</style>
</head>
<body>
	<div style="width: 100%;height:60px;color:white;background-color: red;border: solid white 2px;text-align: center;">
		<h1><b>FAVORITE MOVIES</b></h1>
	</div>
<?php 
	//Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cinemaxdb";
	$conn = mysqli_connect($servername,$username,$password,$dbname);

	//Check connection
	if(!$conn){
		die("connection failed: " . mysqli_connect_error());
	}
	//Inner join in tables movies and favourites to find the movies that are in favourite table
	$sql="SELECT m.title,m.category FROM fav f INNER JOIN movies m ON f.movie_id=m.id";// INNER JOIN user u ON f.user_id=u.id WHERE u.id='".$_SESSION['id']."'";
	$result = $conn->query($sql);
?>

	<table>
	  <tr>
		<th>Title</th>
		<th>Category</th>
	  </tr>
	<?php
	   if($result->num_rows>0){
	   	while ($row = $result->fetch_assoc()) {		
	   	
	?>
	<tr>
		<td><?php echo $row["title"];?></td>
		<td><?php echo $row["category"];?></td>
	</tr>
	<?php 
		}
	}
	?>
</table>
	<button onclick="goBack()"><b>Go Back</b></button>
	<script>
	  function goBack() {
	  window.location.href='movies.php';
	}
	</script>
</body>
</html>