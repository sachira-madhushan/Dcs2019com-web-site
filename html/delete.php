<?php 

	require 'connection.php';
	$id = $_GET['id'];

	$query = "DELETE FROM anounce WHERE ID='$id'";

	if(mysqli_query($con,$query)){
		echo '<script type="text/javascript">alert("Announcement Deleted !");window.location = "admin.php";</script>'; 
		
			
	} 
	else{
		echo '<script type="text/javascript">alert("Error While Deleting !");window.location = "admin.php";</script>'; 
	}
 ?>