<!DOCTYPE html>
<html lang="en">
	<head>
		 <title>Bootstrap!</title>
		 <meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="css/bootstrap.min.css">
		 <script src="Jquery/jquery-3.1.1.js"></script>
		 <script src="Jquery/jquery-3.2.1.min.js"></script>
		 <script src="js/bootstrap.min.js"></script>
		 <script src="jquery_script.js" type="text/javascript" ></script>
		 <script src="js/bootstrap.js"></script>
		 <link href="style_generic.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="well container-fluid">
		  

		  <div class="text-center text-info jumbotron one">
		    <div class="row">
			    <div class="col-xs-3">
					
				</div>
				<div class="col-xs-9">
					<strong class="text-success Logo_msg">HEALTHCARE MONITORING SYSTEM</strong>
				</div>
			</div>
		  </div>
		 <!---------------------------------------php part--------------------------------------------->
			 <?php
				 require "./home/connection.php";
				 session_start();
				 if(isset($_SESSION['name']))
						 {
						   $User = $_SESSION['name'];
						 }
			 ?>
		 <!--------------------------------top part------------------------------------------>
		<!------------------------------------------------------------------------------------->
		<!------------------------------------------------------------------------------------>
		<!------------------------middle part------------------------------------------------->
			<div class="article">
				<div class="text-center jumbotron two">
					<?php
                       if(isset($User))
					   {
						echo "<p class='text-success' > You are an authorized User ,$User</p>";
					   }
					   else if(isset($_GET['id']))
					   {
					      $id = $_GET['id'];
					      if($id==0)
                          {
							echo "<p class='text-danger' > Please Signup or Login to access other pages </p>";
					      }
					      if($id==1)
					      {
					         echo "<p class='text-danger' > Please fill the details!</p>";
					      }
					      if($id==2)
					      {
					        echo "<p class='text-danger' > Please enter correct data!</p>";
					      }
					      if($id==3)
					      {
					        echo "<p class='text-danger' > This EmailId is already registered </p>";
					      }
					      if($id==4)
					      {
					        echo "<p class='text-danger' > Password Don't match, please check again </p>";
					      }
                          if($id==5)
					      {
					        echo "<p class='text-danger' > Some error occurred , please try again Later! </p>";
					      }
						  if($id==6)
						  {
							echo "<p class='text-success' > You have successfully logged out! </p>";  
						  }
					   }	
					   else
					   {
					     echo "<P class='text-success'>Click on The Boxes to Login Or SignUp!</p>";
					   }
  					?>
				</div>
				<div class="row text-center">
					  <div class="col-xs-2"></div>
					  <div class="text-center jumbotron Login-btn col-xs-4" style="background-color:rgba(10,20,30,.4)" onmouseover="this.style.cursor='pointer'">
								<strong >LOGIN </strong><i class="glyphicon glyphicon-triangle-bottom"></i>
					  </div>
					  <div class="text-center jumbotron Signup-btn col-xs-4" style="background-color:rgba(10,20,30,.4)" onmouseover="this.style.cursor='pointer'">
								<strong >SIGNUP</strong ><i class="glyphicon glyphicon-triangle-bottom"></i>
					  </div>
					  <div class="col-xs-2"></div>
				</div>
			</div>
		<!-------------------------------------------------------------------------------------->
		<!-------------------------bottom part-------------------------------------------------->
			<div class="Auth">
				<div class="row Login text-center">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<form role="form" method="post" action="./home/login.php">
						  <div class="form-group">
						    <label for="Username">Username:</label>
						    <input required type="text" class="form-control Log_user" id="Username" name="Username">
						  </div>
						  <div class="form-group">
						    <label for="pwd"  >Password:</label>
						    <input required type="password" class="form-control" id="pwd" name="pwd">
						  </div>
						  <button type="submit" class="btn btn-primary">Submit</button>
						  <button type="reset" class="btn btn-primary">Reset</button>
						</form>
					 </div>
					<div class="col-sm-3"></div>
				</div>
				<div class="row Signup text-center">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<form role="form" method="post" action="./home/signup.php">
						   <div class="form-group">
						    <label for="Username">Username:</label>
						    <input required ype="text" class="form-control Sign_user" id="Username" name="Username">
						  </div>
						  <div class="form-group">
						    <label for="email">Email address:</label>
						    <input required type="email" class="form-control" id="email" name="emailId">
						  </div>
						  <div class="form-group">
						    <label for="pwd1">Password:</label>
						    <input required type="password" class="form-control" id="pwd" name="Password1">
						  </div>
						  <div class="form-group">
						    <label for="pwd2">Confirm Password:</label>
						    <input required type="password" class="form-control" id="pwd" name="Password2">
						  </div>
						  <button type="submit" class="btn btn-primary">Submit</button>
						  <button type="reset" class="btn btn-primary">Reset</button>
						</form>


					</div>
					<div class="col-sm-3"></div>
				</div>
			</div>
		</div>
	 </body>
</html>