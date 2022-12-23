<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>User List page</title>
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
		<h1><b>Users</b></h1>
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
	//collect the data of the table movies
	$sql="SELECT id,name,surname,username,email,role,confirmed FROM users";
	$result = $conn->query($sql);
?>

	<table>
	  <tr>
		<th>id</th>
		<th>Name</th>
		<th>Surname</th>
		<th>Username</th>
		<th>Email</th>
		<th>Role</th>
		<th>Confirmed</th>
	  </tr>
	<?php
	   if($result->num_rows>0){
	   	while ($row = $result->fetch_assoc()) {		
	   	
	?>
	<tr>
		<td><?php echo $row["id"];?></td>
		<td><?php echo $row["name"];?></td>
		<td><?php echo $row["surname"];?></td>
		<td><?php echo $row["username"];?></td>
		<td><?php echo $row["email"];?></td>
		<td><?php echo $row["role"];?></td>
		<td><?php echo $row["confirmed"];?></td>
	</tr>
	<?php 
		}
	}
	?>
</table>
	<button onclick="goBack()"><b>Go Back</b></button>
	<script>
	  function goBack() {
	  window.location.href='admin.php';
	}
	</script>
</body>
</html>