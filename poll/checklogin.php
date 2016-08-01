







<?php
ob_start();
session_start();
$name="root";
$pass="";
$host="localhost";
$dbhandle=mysql_connect($host,$name,$pass);
$selected=mysql_select_db("login",$dbhandle);
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 
$_SESSION["names"]=$myusername;
//To protect SQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM login WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
echo "successfull login";
header("location:login_succesfull.php");
}
else {
echo "<alert>Wrong Username or Password</alert>";
}
ob_end_flush()
?>