<?php 
	require 'connection.php';


	$name=mysqli_real_escape_string($con,$_POST['name']);
	$msg=mysqli_real_escape_string($con,$_POST['message']);

	$query ="INSERT INTO msg(Name,Msg) VALUES('$name','$msg')";

	if(mysqli_query($con,$query)){
		echo '<script type="text/javascript">alert("Thank You For Your Message !");window.location = "home.php";</script>'; 
	}
	else{
		echo '<script type="text/javascript">alert("Error Sending Messages !");window.location = "admin.php";</script>'; 
	}

 ?>