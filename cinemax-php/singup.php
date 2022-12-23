<!DOCTYPE  HTML>
<html>
<head>
	<title>Cinemax Sing Up Page!</title>
	<link rel="stylesheet" type="text/css" href="form.css">
	<style>
		#comment{color: red;font-size: 80%; margin-top:40px;}
	</style>

</head>
<body>
	<div id="div1">
		<h1>Registration</h1>
	</div>
	<p>Cinemax registration form.<br>You can get updated about our theaters movies anytime.</p>
	<p>Please fill the form in order to join us.</p>
	<p id="reglabel" style="text-align: center;color:white;"><b>Registration form:</b></p> 
	
  <div id="div2" style="margin:auto;margin-top: 20px;">
  <form name="myForm" action="" method="post" autocomplete="on" target="_self">
    	<label for="id"><b>ID:</b></label><br>
		<input type="text" id="id"  name="Reg_id" maxlength="20" required><br>
		<label for="name"><b>Name:</b></label><br>
		<input type="text" id="name"  name="Reg_name" maxlength="20" required><br>
		<label for="surname"><b>Surname:</b></label><br>
		<input type="text" id="surname"  name="Reg_surname" maxlength="20" required><br>
		<label for="username"><b>Username:</b></label><br>
		<input type="text" id="Uname"  name="Reg_Uname" maxlength="20" required><br>
		<label for="pass"><b>Password:</b></label><br>
		<input type="password" id="pass"  name="Reg_pass" maxlength="12" required><br>
		<label for="email"><b>Email:</b></label><br>
		<input type="email" id="email"  name="Reg_email" maxlength="30" required><br>
		<label for="role"><b>Role:</b></label><br>
		<select id="role" name="Reg_role">
    		<option value="USER">USER</option>
    		<option value="CINEMAOWNER">CINEMAOWNER</option>
    		<option value="ADMIN">ADMIN</option>
  		</select><br>
		<input type="submit" name="addUser" value="Submit">
  </form>

<p id="comment"><b><u>*Note that your informations will be given to the admin of the system in order to be confirmed*</u></b></p>  


<button onclick="goBack()"><b>Go Back</b></button>
<script>
	function goBack() {
	window.history.back();
	}
</script>

</div>
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
	if(isset($_POST['addUser'])){

		$newID = $_POST['Reg_id'];
		$newName = $_POST['Reg_name'];
		$newSurName = $_POST['Reg_surname'];
		$newUserName = $_POST['Reg_Uname'];
		$newPass = $_POST['Reg_pass'];
		$newEmail = $_POST['Reg_email'];
		$newRole = $_POST['Reg_role'];

		
		//we put value 0 on field confirmed since the user has to wait for the admin to approve him.
		$sql = "INSERT INTO users(id,name,surname,username,password,email,role,confirmed) VALUES ('".$newID."','".$newName."','".$newSurName."','".$newUserName."','".$newPass."','".$newEmail."','".$newRole."',0)";

		if ($conn->query($sql) === TRUE) {
	    	echo ("<script>
	    			window.alert('New user inserted successfully');
	    			window.location.href='index.php';
	    			</script>");
			}else {
	    	echo ("<script>
	    			window.alert('Something went wrong!Please try again');
	    			window.location.href='singup.php';
	    			</script>");
			}
	}
	$conn->close();
?>