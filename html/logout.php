<?php 
	session_start();
		setcookie("u_name","", time()-(86400 * 30),"/");
		unset($_SESSION['u_name']);
		header('Location:../index.php');


 ?>