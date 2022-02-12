<?php 
	session_start();
	require 'connection.php';
	if(isset($_POST['submit2'])){
	$username= mysqli_real_escape_string($con,$_POST['name']);
	$pass= mysqli_real_escape_string($con,$_POST['pass']);
	$quary1="select * from login where User_Name='$username' limit 1;";
		$out1=mysqli_query($con,$quary1);
		$row=mysqli_fetch_array($out1);
		if($row>=1){
				$quary2="select Password from login where User_Name='$username' limit 1;";
				$out2=mysqli_query($con,$quary2);
				$row=mysqli_fetch_array($out2);

				if(md5($pass)==$row[0]){
					echo '<Script>alert("Login Success !")</Script>';

					setcookie("u_name",$username, time()+(86400 * 30),"/");
					$_SESSION['u_name'] = $_COOKIE['u_name'];
					if($_COOKIE['u_name']=="admin"){

						header('Location:admin.php');
					}
					else{
						header('Location:../index.php');

					}
				}
				else{
					echo '<Script>alert("Username Or Password Incorrect !")</Script>';
				}
		}
		else{
			echo '<Script>alert("Username Or Password Incorrect !")</Script>';
		}
	}
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<title>Login</title>
</head>
<body>

<form id="login" action="#" method="post">
	<img src="../src/icon.png"><h1>Log-in</h1>
	<div class="items">
    <input type="text" class="input" id="email" placeholder="Enter Your User Name" name="name">

   <input type="password" class="" id="password" placeholder="Enter your Password" name="pass"><br><br>
  <button type="submit" class="btn btn-primary" name="submit2">Log In</button>
  <p>Don't You Have An Account ?<a href="register.php"> Register</a></p>
  </div>
</form>







<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>