<!DOCTYPE html>
<html lang="en">
	<head>
		 <title>Home</title>
		 <meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="css/bootstrap.min.css">
		 <script src="Jquery/jquery-3.1.1.js"></script>
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
						$User = '';
						if(isset($_GET['name']))
						{
							$User = $_GET['name'];
							$_SESSION['name']=$_GET['name'];
						}
						else if(isset($_SESSION['name']))
						{
							$User = $_SESSION['name'];
						}
						else
						{
							Header("Location: index.php?id=0");
						}
					?>
		 <!--------------------------------top part------------------------------------------>
			<div class="header">
			     <nav class="navbar navbar-inverse navbar-fixed-top">
				 <div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">HOME</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
					  <ul class="nav navbar-nav">
					  	 <li>
							
								<span class="glyphicon glyphicon-user"></span>
								  <?php
										if(isset($User))
										{
											echo "$User";
										}
										else
										{
											echo "USER";
										}
									?>
							</a>
						   </li>
						   <form class="navbar-form navbar-right" method="post" action="logout.php">
							<?php
								if(isset($User))
								{
								  echo '<button type="submit" name="logout" class="btn btn-primary active" >LOGOUT</button>';
								}
								else
								{
								  echo '<button class="btn btn-primary navbar-btn disabled">LOGOUT</button>';
								}
							?>
					  </ul>
					</div>
				  </div>
				</nav>
			</div>
			<div class="jumbotron two notify text-center text-warning">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8 text-center table-responsive">
					   <table class="table table-striped table-hover">
						<?php
							if(isset($User))
							{
								 $sql = "SELECT msg,time FROM notification";
								 $res = mysql_query($sql);
								 if($res)
								 {
									$row = mysql_num_rows($res);
									if($row!=0)
									{
										while($row = mysql_fetch_assoc($res))
										{
											echo '<tr class="info">'.
											'<td class="text-success text-center">'.$row['msg'].'</td>'.
											'<td class="text-success text-center"> At </td>'.
											'<td class="text-success text-center">'.$row['time'].'</td>'.
											'</tr>';
										}
									}
									else
									{
										echo '<span class="text-danger">No notification at present!</span><br>';
									}
								 }
							}
							else
							{
								echo '<span class="text-warning">Login or Signup to view notifications!</span><br>';
							}
							 
						?>
					    </table>
					</div>
				<div class="col-sm-2"></div>
			  </div>
		     </div>
		<!------------------------------------------------------------------------------------->
		<!------------------------------------------------------------------------------------>
		<!------------------------middle part------------------------------------------------->
		
		<div class="jumbotron two text-center text-warning history">
			     <div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8 text-center table-responsive">
					   <table class="table table-striped table-hover">
						<?php
							if(isset($User))
							{
								 $sql = "SELECT * FROM pulse";
								 $res = mysql_query($sql);
								 if($res)
								 {
									$row = mysql_num_rows($res);
									if($row!=0)
									{
										echo "<tr> <th> Temparature </th> <th> Heart Rate </th> <th> Date </th> <th> Time </th>";
										for($i=0;$i<$row;$i++)
										{
											echo '<tr class="info">'.
											'<td class="text-success text-center">'.mysql_result($res, $i,0).'</td>'.
											'<td class="text-success text-center">'.mysql_result($res, $i,1).' </td>'.
											'<td class="text-success text-center">'.mysql_result($res, $i,2).'</td>'.
											'<td class="text-success text-center">'.mysql_result($res, $i,3).'</td>'.
											'</tr>';
										}
									}
									else
									{
										echo '<span class="text-danger">No data at present</span><br>';
									}
								 }
							}
							else
							{
								echo '<span class="text-warning">Login or Signup to view data!</span><br>';
							}
							 
						?>
					    </table>
					</div>
				<div class="col-sm-2"></div>
			  </div>
		     </div>




		<!-------------------------------------------------------------------------------------->
		<!-------------------------bottom part-------------------------------------------------->
			<div class="jumbotron one text-center">
			 <strong>Final Year Project</strong>
			</div>
		</div>
	 </body>
</html>