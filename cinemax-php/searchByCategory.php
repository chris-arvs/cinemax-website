<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Search by Title</title>
	<link rel="stylesheet" type="text/css" href="form.css">
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
	<div id="div1"><b><h1>Search By Category</h1><b></div>
	<div id="div3">
	<form name="SearchByCategory" action="" method="post" autocomplete="on" target="_self">
	   	<label for="Category"><b>Category:</b></label><br>
	   	<input type="text" id="category"  name="category" maxlength="20" required><br>
	   	<input type="submit" name="SearchByCategory" value="Search">
	  	</form>
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
	if(isset($_POST['SearchByCategory'])){
		//collect the data of the table movies
		$category = $_POST['category'];
		$sql="SELECT id,title,category FROM movies WHERE category='".$category."'";
		$result = $conn->query($sql);
		?>
		<table>
			<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Category</th>
			 </tr>
		<?php
			if($result->num_rows>0){
			  while ($row = $result->fetch_assoc()) {		
			   	
		?>
			<tr>
				<td><?php echo $row["id"];?></td>
				<td><?php echo $row["title"];?></td>
				<td><?php echo $row["category"];?></td>
			</tr>
			<?php 
				}
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