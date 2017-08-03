<?php
	
	session_start();
	if(isset($_SESSION['name']))
	{
		session_destroy();
		Header("Location: index.php?id=6");
	}
	else
	{
		Header("Location: index.php");
	}
?>