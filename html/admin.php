<?php 
	require 'connection.php'; 
	session_start();
	$quary2="select * from anounce ORDER BY Id DESC;";
	$out2=mysqli_query($con,$quary2);
	$quary3="select * from msg ORDER BY Id DESC;";
	$out3=mysqli_query($con,$quary3);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link rel="stylesheet" type="text/css" href="../css/home.css">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script> -->

	<title></title>

</head>
<body>
<div class="main">
	<div class="top">
		<div class="logo">
			<h1>DCS - 2019COM - Site</h1>
			<h1>Administrator</h1>
		</div>
		<div class="hi">
			<h1>Hello , Sachira !</h1>
		</div>
	</div>
	<div class="middle">
		<div class="midleft">	
				<a href="home.php"><button>Check Home Page</button></a>
				<a href="logout.php"><button>Log-Out</button></a>
				<div class="card">
		  <h5 class="card-header">Messages From Users</h5>
		  <div class="card-body">
		    <p class="card-text">
		    	
		    	
		    		<?php 
		    		while($rawss = mysqli_fetch_assoc($out3)){
		    				
		    				echo "<div class='alert alert-warning ' role='alert' >From :".$rawss['Name']."<br>Msg :".$rawss['Msg']."
							 
							</div>";
		    			
		    			}
    	 ?>
		    	</p>
		    	<form action="msgtabledel.php" method="post">
		    		<button type="submit">Clear All Messages</button>
		    	</form>
		  </div>

		</div><!-- card -->
				
		</div>
		<div class="midright">
			<?php
	$sql = "SELECT * FROM timetable";
	$resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
	?>
	<table class="table table-dark table-hover">
		<thead>
		  <tr>			
			<th>Time</th>
			<th>Monday</th>
			<th>Tuesday</th>				
			<th>Wednesday</th>				
			<th>Thursday</th>				
			<th>Friday</th>				
		  </tr>
		</thead>
		<tbody>
		 <?php
		 while( $rows = mysqli_fetch_assoc($resultset) ) { 
		 ?>
			  <tr>				  
				  <td contenteditable="false" data-old_value="<?php echo $rows["Time"]; ?>" onBlur="saveInlineEdit(this,'Time','<?php echo $rows["Id"]; ?>')" onClick="highlightEdit(this);"><?php echo $rows["Time"]; ?></td>

				  <td contenteditable="true" data-old_value="<?php echo $rows["Mon"]; ?>"  onBlur="saveInlineEdit(this,'Mon','<?php echo $rows["Id"]; ?>')" onClick="highlightEdit(this);"><?php echo $rows["Mon"]; ?></td>

				  <td contenteditable="true" data-old_value="<?php echo $rows["Tue"]; ?>"  onBlur="saveInlineEdit(this,'Tue','<?php echo $rows["Id"]; ?>')" onClick="highlightEdit(this);"><?php echo $rows["Tue"]; ?></td>

				  <td contenteditable="true" data-old_value="<?php echo $rows["Wed"]; ?>"  onBlur="saveInlineEdit(this,'Wed','<?php echo $rows["Id"]; ?>')" onClick="highlightEdit(this);"><?php echo $rows["Wed"]; ?></td>

				  <td contenteditable="true" data-old_value="<?php echo $rows["Thur"]; ?>"  onBlur="saveInlineEdit(this,'Thur','<?php echo $rows["Id"]; ?>')" onClick="highlightEdit(this);"><?php echo $rows["Thur"]; ?></td>

				  <td contenteditable="true" data-old_value="<?php echo $rows["Fry"]; ?>"  onBlur="saveInlineEdit(this,'Fry','<?php echo $rows["Id"]; ?>')" onClick="highlightEdit(this);"><?php echo $rows["Fry"]; ?></td>
			  </tr>
		<?php
		}
		?>
		</tbody>
	</table>
		<div class="anounce">
			
		<div class="card">
		  <h5 class="card-header">Anouncements ></h5><div class="drop">
		  		<form action="addnewannounce.php" method="post">
		  		<input type="text" id="msg" name="msg" placeholder="Type a new announcement">

		  		<button type="submit" class="sendbut"><img src="../src/send.png"></button>
		  		</form>

		  	
		  <div class="card-body">
		    <p class="card-text">
		    	
		    	
		    		<?php 
		    		while($rawss = mysqli_fetch_assoc($out2)){
		    			
		    			$date = date("d") - $rawss['D'];
		    			if(date("H")<$rawss["H"]){
		    				$hours = (date("H")+24)-$rawss["H"];
		    				$date--;
		    			}
		    			else{
		    				$hours = date("H")-$rawss["H"];
		    			}

		    			if(date("i")<$rawss['M']){
		    				$minutes = (date("i")+60)-$rawss['M'];
		    				$hours--;
		    			}
		    			else{
		    				$minutes =date("i")-$rawss['M'];
		    			}

		    			if($hours>1 && $date==0){
		    				$displaydate = $hours." Hours Ago";
		    			}
		    			else if($minutes>1 && $hours==0){
		    				$displaydate = $minutes." Minutes Ago";
		    			}
		    			else if($date>1){
		    				$displaydate = $date." Days Ago";
		    			}
		    			else if($minutes==1 && $hours==0){
		    				$displaydate = $minutes." Minute Ago";
		    			}
		    			else if($hours==1 && $date==0){
		    				$displaydate = $hours." Hour Ago";
		    			}
		    			else if($date==1){
		    				$displaydate = $date." Day Ago";
		    			}

		    			else{
		    				$displaydate = "Just Now";
		    			}		    			
		    			echo "<div class='alert alert-success' role='alert'>
		    	<div class='message'>
  					".$rawss['Anouncement']."	
		    	</div>
		    	<div class='timeright'>
		    	<div class='time'>".$displaydate."</div>
		    	<div class='delete'><a href='delete.php?id=".$rawss['Id']."'><img src='../src/delete.png' width='20%'></a></div>
		</div> </div>";

		    		}
    	 ?>
		    	</p>

		  </div>

		</div><!-- card -->
		</div><!-- anounce -->

		</div><!-- left -->

	</div>


</div>
<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jqueryui.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- <script type="text/javascript" src="../js/jq.js"></script> -->

	
<script type="text/javascript" src="../js/my.js"></script>
<script type="text/javascript" src="../js/functions.js"></script>
</body>
</html>