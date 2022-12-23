<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
	<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
	<div id="div1"><b><h1>Update User Credits</h1><b></div>
	<div id="div3">
	<form action="" method="POST" >
		<label for="id"><b>ID:</b></label><br>
		<input type="text" id="id"  name="id" maxlength="20" required><br>
		<label for="name"><b>Name:</b></label><br>
		<input type="text" id="name"  name="name" maxlength="20" ><br>
		<label for="surname"><b>Surname:</b></label><br>
		<input type="text" id="surname"  name="surname" maxlength="20" ><br>
		<label for="username"><b>Username:</b></label><br>
		<input type="text" id="Uname"  name="Uname" maxlength="20" ><br>
		<label for="email"><b>Email:</b></label><br>
		<input type="email" id="email"  name="email" maxlength="30"><br>
		<label for="role"><b>Role:</b></label><br>
		<select id="role" name="role">
    		<option value="USER">USER</option>
    		<option value="CINEMAOWNER">CINEMAOWNER</option>
    		<option value="ADMIN">ADMIN</option>
  		</select><br>
  		<label for="confirmed"><b>Confirmed:</b></label><br>
  		<input type="number" id="confirmed"  name="confirmed" maxlength="2"><br>
  		<input type="submit" name="editUser" value = "edit">
	</form>
	</div>
	<p style="color: red;text-align: center;"><i><b>*Note that if you want to confirm a user you have to put his id and change the confirmation status from 0 to 1 and once you confirm a user you cannot unconfirm him.You can only delete him.*</b></i></p>
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

	if(isset($_POST['editUser'])){
		$id=$_POST['id'];
		if(!empty($_POST['name'])){
			$newName = $_POST['name'];
			$sql = "UPDATE users SET name='".$newName."' WHERE id='".$id."' ";
		    if($conn->query($sql) === FALSE) {
    			echo ("<script LANGUAGE='JavaScript'>
    				window.alert('Wrong id!Please try again');
    				window.location.href='editUser.php';
    			  </script>");
			} 
		}
		if(!empty($_POST['surname'])){
			$newSurName = $_POST['surname'];
			$sql = "UPDATE users SET surname ='".$newSurName."' WHERE id='".$id."' ";
		    if($conn->query($sql) === FALSE) {
    			echo ("<script LANGUAGE='JavaScript'>
    				window.alert('Wrong id!Please try again');
    				window.location.href='editUser.php';
    			  </script>");
			} 
		}

		if(!empty($_POST['Uname'])){
			$newUserName = $_POST['Uname'];
			$sql = "UPDATE users SET username='".$newUserName."' WHERE id='".$id."' ";
		    if($conn->query($sql) === FALSE) {
    			echo ("<script LANGUAGE='JavaScript'>
    				window.alert('Wrong id!Please try again');
    				window.location.href='editUser.php';
    			  </script>");
			} 
		}
		if(!empty($_POST['email'])){
			$newEmail = $_POST['email'];
			$sql = "UPDATE users SET email='".$newEmail."' WHERE id='".$id."' ";
		    if($conn->query($sql) === FALSE) {
    			echo ("<script LANGUAGE='JavaScript'>
    				window.alert('Wrong id!Please try again');
    				window.location.href='editUser.php';
    			  </script>");
			} 
		}
		if(!empty($_POST['role'])){
			$newRole = $_POST['role'];
			$sql = "UPDATE users SET role='".$newRole."' WHERE id='".$id."' ";
		    if($conn->query($sql) === FALSE) {
    			echo ("<script LANGUAGE='JavaScript'>
    					window.alert('Wrong id!Please try again');
    					window.location.href='editUser.php';
    			  		</script>");
			} 
		}

		if(!empty($_POST['confirmed'])){
			$newConfirmation = $_POST['confirmed'];
			$sql = "UPDATE users SET confirmed='".$newConfirmation."' WHERE id='".$id."' ";
		    if($conn->query($sql) === FALSE) {
    			echo ("<script LANGUAGE='JavaScript'>
    				window.alert('Wrong id!Please try again');
    				window.location.href='editUser.php';
    			  </script>");
			} 
		}
		echo ("<script LANGUAGE='JavaScript'> window.alert('Register updated'); window.location.href='editUser.php';</script>");
		
}
	$conn->close();
?>