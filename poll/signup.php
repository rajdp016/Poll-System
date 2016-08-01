<?php
ob_start();
$name="root";
$pass="";
$host="localhost";
$dbhandle=mysql_connect($host,$name,$pass);
$selected=mysql_select_db("login",$dbhandle);
$msg="";
$myname=$_POST['name']; 
$myEmail=$_POST['Email']; 
$mobileNumber=$_POST['mobileNumber'];
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];
  $sql = "INSERT INTO login".
      "(name,email,mobilenumber,username,password)".
      "VALUES ( '$myname', '$myEmail',$mobileNumber,'$myusername','$mypassword' )";
      
   $retval = mysql_query( $sql, $dbhandle);
   
   if(! $retval ) {
   	// $msg="Could not enter data";
      echo "<script type='text/javascript'>confirm('could not enter data');</script>";
       echo "<script type='text/javascript'>window.location='index.php'</script>";
   }
   else{
   	// $msg="Data entered successfully";
   echo "<script type='text/javascript'>alert('Data entered successfully');</script>";
   echo "<script type='text/javascript'>window.location='index.php'</script>";
   // header("location:loginnew.php");
}
   ?>