<?php 

	require 'connection.php';

	$today=date("d");
	$hours = date("H");
	$min = date("i");
	$msg=$_POST['msg'];

	$query="INSERT INTO anounce(Anouncement,H,M,D) VALUES('$msg','$hours','$min','$today')";
	if(mysqli_query($con,$query)){
		echo '<script type="text/javascript">alert("Announcement is added !");window.location = "admin.php";</script>'; 
	}
	else{
		echo '<script type="text/javascript">alert("Error While Adding !");window.location = "admin.php";</script>'; 
		
	}
 ?>