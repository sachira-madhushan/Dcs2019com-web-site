<?php
	require 'connection.php'; 
$sql = "UPDATE timetable set ".$_REQUEST["column"]."='".$_REQUEST["value"]."' WHERE  id='".$_REQUEST["id"]."'";
mysqli_query($con, $sql) or die("database error:". mysqli_error($conn));
echo "<script>alert('Updated !'');</script>";
?>