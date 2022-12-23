<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<style>
		body{background-image: url('img/j5.jpeg');background-repeat: no-repeat;background-size: cover;}
		h1{color:black; text-align: center; margin-bottom: 100px;}
	</style>
	<title>Cinemax Validation Page!</title>
</head>
<body>
	<h1>Cinemax validation page!!</h1>
</body>
<?php 
//get username and password
$username = $_POST['Uname'];
$password = $_POST['pass'];

//Connect to the db
$conn = mysqli_connect("localhost","root","","cinemaxdb");
//Check connection
if(!$conn){
	die("connection failed: " . mysqli_connect_error());
}

//Check if the user exists in the database and is confirmed by admin
$sql="SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."' AND confirmed = 1";
$result = $conn->query($sql);

if($result->num_rows>0){
	$row = $result->fetch_assoc();//Fetch a result row as an associative array
	if($row['username'] == $username && $row['password'] == $password){
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['id'] = $row['id'];
		//if user exists direct at welcome.php
		echo ("<script>location.href = 'welcome.php';</script>");
	}
}
else{
	echo ("<script>window.alert('Invalid username or password!'); window.location.href='index.php';</script>");
}
$conn->close();
?>
</html>