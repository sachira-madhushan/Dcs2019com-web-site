<?php 
	session_start();
	if(isset($_COOKIE['u_name'])){
		
		if($_SESSION['u_name']=="admin"){
			header('Location:html/admin.php');
		}

		else{
			header('Location:html/home.php');
		}
	}
	else{
		unset($_SESSION['u_name']);
		header('Location:html/loging.php');
	}
	
 ?>