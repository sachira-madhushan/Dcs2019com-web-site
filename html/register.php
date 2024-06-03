<?php 
	require 'connection.php';


	if(isset($_POST['submit'])){
		$username= mysqli_real_escape_string($con,$_POST['name']);
		$pass= mysqli_real_escape_string($con,$_POST['pass']);
		$conpass=  mysqli_real_escape_string($con,$_POST['conpass']);
		$lenthpass=strlen($pass);
		$hashedpass=md5($pass); 
		if($pass==$conpass){
			if($lenthpass<8){
				echo '<Script>alert("Password Should At Least 8 Characters !")</Script>';
			}
			else{

				$quary1="select * from login where User_Name='$username' limit 1;";
				$out1=mysqli_query($con,$quary1);
				$row=mysqli_fetch_array($out1);
				if($row>=1){
					echo '<Script>alert("This Username Already Exist!")</Script>';
				}
				else{

				$quary2="insert into login(User_name,Password) values('$username','$hashedpass');";
				$out2=mysqli_query($con,$quary2);
					if($out2){
						echo '<script type="text/javascript">alert("Registration Success!");window.location = "loging.php";</script>';
						
					}
					else{
						echo '<Script>alert("An Unknown Error Occured !)</Script>';
					}
				}


			}
		}
		else{
			echo '<Script>alert("Password Doesn\'t Match !")</Script>';
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
	<!-- <img src="../src/icon.png"> -->
	<h2>DCS - 2019</h2>
	<h1>Sign-Up</h1>
	<div class="items">
    <input type="text" class="input" id="email" placeholder="Username" name="name">

   <input type="password" class="" id="password" placeholder="Password" name="pass"><br><br>
   <input type="password" class="" id="conpassword" placeholder="Confirm Password" name="conpass"><br><br>
  <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
  <br>
  <br>
  <p>Do You Have An Account ? <a href="loging.php">Log In</a></p>
  </div>
</form>







<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>