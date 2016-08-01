<?php
ob_start();
session_start();
$name="root";
$pass="";
$host="localhost";
$dbhandle=mysql_connect($host,$name,$pass);
$selected=mysql_select_db("login",$dbhandle);
$msg="";
if (isset($_POST['Submit']) && !empty($_POST['myusername'])    && !empty($_POST['mypassword']))
  {
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

echo "<script type='text/javascript'>alert('Wrong Username or Password');</script>";
}
}
ob_end_flush()

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="LoginCss.css">
	<title>Login</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
   
     $("#signup").click(function(){
        $(".signup").css("display", "flex");
    });
 
       $(".closesignup").click(function(){
        $(".signup").css("display", "none");
    });
});
</script>
</head>
<body>
<!-- <div class="heading">
	<h1>Vote For Betterment</h1>
</div> -->
	<!-- <div class="main">

		<div class="content">
		<form action="checklogin.php" method="post">
			<div><input type="text" placeholder="Username" name="myusername"></div>
			<div><input type="text" placeholder="Password" name="mypassword"></div>
			<input type="submit" value="Login" name="Login">
			</form>
		</div>
	</div> -->

	<div class="login">
	<div class="logincontent">

	<form action="" name="form1" method="POST">
	
		<h2 style="font-family: roboto; font-weight: 700; font-size: 2.5rem;">Vote For Betterment	</h2>	
	<input name="myusername" type="text" id="myusername" placeholder="Username">
	<input name="mypassword" type="password" id="mypassword" placeholder="Password">
	<input type="submit" name="Submit" value="Login" class="btnform">
<p style="font-family: roboto; font-weight: 400;">Not a member yet? <a style="color: red;" id="signup">Sign Up</a> for free </p>
</form>

</div>
</div>


<div class="signup">
	<div class="signupcontent">

	<form action="signup.php" name="form2" method="POST">
		<i class="fa fa-times closesignup"></i>
		<h2 style="font-family: roboto; font-weight: 700; font-size: 2.5rem;">Sign Up for Free</h2>

	<input name="name" type="text" placeholder="Full Name">
	<input name="Email" type="text"  placeholder="Email ID">

	<input name="mobileNumber" type="text"  placeholder="Phone Number">

	<input name="myusername" type="text"  placeholder="Username">
	<input name="mypassword" type="text"  placeholder="Password">
	<input type="submit" name="signup" value="Sign Up" class="btnform">
</form>
</div>
</div>
</body>
</html>