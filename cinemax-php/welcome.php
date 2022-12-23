<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

<style>
body {
 background-image: url('img/j3.jpeg');
 background-repeat: no-repeat;
 background-size: cover;
}

.topnav {
  overflow: hidden;
  background-color: red;
  border: solid white 3px;
}

#div1{color:black;font-size:100%;position: absolute;top:20px;right: 20px;}
.topnav a{
  float: left;
  color: white;
  text-align: center;
  padding: 20px 22px;

  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover{
  background-color: yellow;
  color: black;
}

#divh{width: 300px;height:50px;background-color:red;color: white;font-size: 160%;border: solid white 2px;margin:auto;margin-top:300px;text-align: center;}

</style>
</head>
<?php
  //The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.
  if(!isset($_SESSION['username'])){
     echo("<script>location.href = 'index.php';</script>");
  }
  $username = $_SESSION['username'];

  $role=$_SESSION['role'];
?>
<body>
<div id="div1"><b><?php echo nl2br("$username\n$role");?></b></div>

<div class="topnav">
  <a href="singup.php?id=1">Sing Up</a>
  <a href="movies.php?id=2">Movies</a>
  <a href="owner.php?id=3">Owner</a>
  <a href="admin.php?id=4">Administration</a>
  <a href="logout.php?id=6">Log out</a> 
</div>

<div id="divh">Welcome to our system</div>
</body>
</html>

