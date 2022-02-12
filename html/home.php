<?php 

	require 'connection.php'; 

	session_start();
	if(isset($_COOKIE['u_name'])){
		$yousername=$_COOKIE['u_name'];
	}
	else{
		
		header('Location:loging.php');
	}

	$quary1="select * from timetable;";
	$out1=mysqli_query($con,$quary1);
	$quary2="select * from anounce ORDER BY Id DESC;";
	$out2=mysqli_query($con,$quary2);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/home.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


	<title></title>
</head>
<body id="particles-js">
<div class="main ">
	<div class="top">
		<div class="logo">
			<h1>DCS - 2019COM - Site</h1>
			<h3>Developed By J.P.Sachira Madhushan</h3>
		</div>
		<div class="hi">
			<h1>Hello , <?php echo $_COOKIE['u_name']; ?> !</h1>
		</div>
	</div>
	<div class="middle">
		<div class="midleft">
				<button id="About">About Me</button>
				<div class="aboutme">
					<h4>Hi ,I'm Sachira Madhushan</h4>
					<h6>EUSL/TC/IS/2019/COM/17</h6>
					<img src="../src/me.jpg">
					<p>I'm a Computer Science student, Eastern University of Sri Lanka. Also a programmer,Youtuber and a blogger. Interested in application development. I have studied Computer Science, Unity Game Development, Android App Development and Web app development.</p>
					<p>Email :Sacheeramadushan455@gmail.com</p>
					<p>Phone :078-3398454</p>
					<p><a href="https://github.com/sachira-madhushan">My Github Profile</a></p>
				</div>	
				<a href="checkadministrator.php"><button>Adminstrator</button></a>
				<a href="logout.php"><button>Log-Out</button></a>
				<button id="send">Send Me A Message</button>
				<div class="send">
					<form action="sendmeamsg.php" method="post">
					<p>Your Name</p>
					<input type="text" name="name" placeholder="Your Name Here">
					<p>Your Message</p>
					<textarea name="message" placeholder="Your Message"></textarea>
					<button type="submit" name="submit">Send</button>
					</form>
				</div>
		</div>
		<div class="midright">
			<div class="timetable">
			<fieldset>
				<legend>2<sup>nd</sup> Semester Time Table</legend>
			<table class="table table-hover table-dark">

		  <thead>
		    <tr>
		      <th scope="col">Time</th>
		      <th scope="col">Monday</th>
		      <th scope="col">Tuesday</th>
		      <th scope="col">Wednesday</th>
		      <th scope="col">Thursday</th>
		      <th scope="col">Friday</th>
		    </tr>
		  </thead>
		  <tbody>
		  		<?php 
		  		
		  		while($raw = mysqli_fetch_assoc($out1)) {
 					echo "<tr><td scope='row'>".$raw['Time']."</td><td scope='row'>".$raw['Mon']."</td><td>".$raw['Tue']."</td scope='row'><td>".$raw['Wed']."</td scope='row'><td>".$raw['Thur']."</td><td scope='row'>".$raw['Fry']."</td></tr>";
	
						  }
		  		
		  		 ?>  		

		    
		  </tbody>
		</table>
		</fieldset>
			</div>
			<div class="anounce">

		<div class="card">
		  <h5 class="card-header">Anouncements</h5>
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
		    	</div><div class='time'>".$displaydate."</div><!-- time -->
		</div>";

		    		}
    	 ?>
		    	</p>

		  </div>
		</div><!-- card -->

			</div><!-- anounce -->
		</div>
	</div>


</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript" src="../js/my.js"></script>
<script type="text/javascript" src="../js/particles.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

</body>
</html>