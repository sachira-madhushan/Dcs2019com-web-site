<?php 

	require 'connection.php';

	$query = "DELETE FROM msg";

	if(mysqli_query($con,$query)){
		echo '<script type="text/javascript">alert("Messages Deleted !");window.location = "admin.php";</script>'; 
		
	}
 ?>