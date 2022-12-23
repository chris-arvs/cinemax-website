<!DOCTYPE html>
<html>
<head>
	<style>
		body{
			background-color: #46403F;
			background-image: url('img/j5.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
		h1{color:black; text-align: center; margin-top:5px;}
		p{color:black;}
		u{color:black;}
		label{color: black;margin: auto;}
		input{color: black;border:2px solid black;}
		#div1{width: 100%;height: 50px;background-color: #b3ccff;margin-bottom: 40px;border:2px solid black;}
		#div2{width: 600px;height: 250px; padding: 20px; margin: auto;background-color: #b3ccff;border:4px solid black;margin-top: 200px;}
	</style>
	<title>Cinemax index page!</title>

</head>

<body>
 <div id="div1">
 	<h1> Cinemax </h1>
 </div>
 <div id = "div2">
 <p style="font-size: 120%; margin-bottom: 50px"><i><b> Welcome to cinemax.<br>Please provide your credentials to procceed.</b></i></p> 
 <form  action="validation.php" method="post" autocomplete="on" target="_self" >
 <label for="Uname"><b>Username:</b></label>
 <input type="text" id="Uname"  name="Uname" maxlength="20" required>
 <label for="pass"><b>Password:</b></label>
 <input type="password" id="pass"  name="pass"  maxlength="12" required>
 <input type="submit" value="Log in">
 </form>
 <p style ="margin-bottom: 20px;margin-top: 40px;">If you do not have an account click to the button below to create one.</p>
 <form action="singup.php" target="_self">
 <input type="submit" value="Sing up">
</form> 
</div>
</body>

</html>