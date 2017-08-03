<?php
 include "connection.php";
 $User = $_POST['Username'];
 $pwd = $_POST['pwd'];
 if(empty($User) or empty($pwd))
 {
   header('Location: ./../index.php?id=1');
 }
 else
 {
   $query = "select * from User where Username='".$User."' and Password = '".$pwd."'";
   $res = mysql_query($query); //or die(mysql_error());
   $row = mysql_num_rows($res);
   if($row!=0)
   {
     header("Location: ./../home.php?name=$User");
   }
   else
   {
     header('Location: ./../index.php?id=2');
   }

 }
?>