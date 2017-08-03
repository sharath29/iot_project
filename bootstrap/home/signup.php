<?php
 include "connection.php";
 $user = $_POST['Username'];
 $mailid = $_POST['emailId'];
 $pwd1 = $_POST['Password1'];
 $pwd2 = $_POST['Password2'];
 
 if(empty($mailid) or empty($pwd1) or empty($user) or empty($pwd2))
 {
   header('Location: ./../index.php?id=1');
 }
 else if($pwd1!==$pwd2)
 {
   header('Location: ./../index.php?id=4');
 }   
 else
 {
   $sql = "select * from User where Email='".$mailid."'";
   $res = mysql_query($sql) or die(mysql_error());
   if($res)
   {
     $row = mysql_num_rows($res);
     if($row!=0)
     {
      header('Location: ./../index.php?id=4');
     }
     else
     {
       $sql = "insert into User values('".$user."','".$mailid."','".$pwd1."')";
       $res = mysql_query($sql) or die(mysql_error());
       if($res) 
       {
         header("Location: ./../home.php?name=$user");
       }
       else
       {
         header("Location: ./../index.php?id=5");
       }
     }
   } 
   else
   {
     header("Location: ./../index.php?id=5");
   }  
 }
?>