<?php 
if($_COOKIE['u_name']=="admin"){

	header('Location:admin.php');
}
else{
	setcookie("u_name","", time()-(86400 * 30),"/");
	header('Location:logout.php');
}


?>