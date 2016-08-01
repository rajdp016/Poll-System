

<html>
<link rel="stylesheet" href="loginstyle.css">

</html>
<?php 
ob_start();
session_start();
$count = $c = 0;
$users=$com1=$com2=array();
  $client=$_SESSION["names"];
// $name=$_SESSION["names"].".jpg";
// display file upload form 
if (!isset($_POST['submit']))
 { ?>
  <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="upload">  
  	<input type="hidden" name="MAX_FILE_SIZE" value="8000000" /> 
  	Select file:
  	  <input type="file" name="data" /> 
  	   <input type="submit" name="submit" value="Upload File" /></form> 
  	    <?php } else {
  	     // check uploaded file size
  	      if ($_FILES['data']['size'] == 0) {
  	       die("ERROR: Zero byte file upload");
  	        } // check if file type is allowed (optional)
  	         $allowedFileTypes = array("image/gif", "image/jpeg", "image/pjpeg"); 
  	         if (!in_array($_FILES['data']['type'], $allowedFileTypes)) 
  	         	{
  	         	 die("ERROR: File type not permitted"); } 
  	         	 // check if this is a valid upload 
  	         	 if (!is_uploaded_file($_FILES['data']['tmp_name']))
  	         	  { die("ERROR: Not a valid file upload"); }
  	         	   // set the name of the target directory 
  	         	$uploadDir = "./uploads/";
              $name=$_SESSION["names"].".jpg";
  	         	 // copy the uploaded file to the directory
  	         	  move_uploaded_file($_FILES['data']['tmp_name'], $uploadDir . $name) or die("Cannot copy uploaded file"); 
  	         	  // display success message
  	         	   echo "File successfully uploaded to " . $uploadDir .$_FILES['data']['name'];
                 echo $_FILES['data']['name'];
                  // $n=$_FILES['data']['name'];

                  }

$msg="";
                  if (isset($_POST['send'])){
      
          $name="root";
$pass="";
$host="localhost";
$dbhandle=mysql_connect($host,$name,$pass);
$selected=mysql_select_db("login",$dbhandle);
           
$message=$_POST['message'];

   $sql = "INSERT INTO comment".
      "(username,message)".
      "VALUES ( '$client', '$message' )";
      
   
   $retval = mysql_query( $sql, $dbhandle );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
      $msg="Could Not Enter Data";
   }
   $msg="Your post submitted sucessfully";
   // echo "<script type='text/javascript'>alert('Your Post submitted sucessfully');</script>";
}



                //-----------------------------------------------------------------------------
                  // if($_SESSION["names"]=="brar"){
// $name=$_SESSION["names"].".jpg";
                    $qwe="op";
$name="root";
$pass="";
$host="localhost";
$dbhandle=mysql_connect($host,$name,$pass);
$selected=mysql_select_db("login",$dbhandle);

$sql="SELECT username FROM login";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$loop=0;
 while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
      // echo "username :{$row['username']}  <br> ";
        $users[$loop]="{$row['username']}";
        $loop++;
   }
   $sql="SELECT * FROM comment";
$result=mysql_query($sql);
$c=mysql_num_rows($result);
$loop=0;
 while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
     
        $com1[$loop]="{$row['username']}";
        $com2[$loop]="{$row['message']}";
        
        $loop++;
   }

   // for($i=0;$i<$count;$i++)
   //  echo $users[$i];

                  // }
          
                 ?> 

                 <!-- ----------------------comment-------------------------
                  -->

                  <?php




                  ?>
                 <html>
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

    // if("<?php echo $client?>"=="brar")
    // {
   $(".upload").css("display","none");
      $("#signup").click(function(){
        $(".signup").css("display", "block");
    });
 
       $(".closesignup").click(function(){
        $(".signup").css("display", "none");
    });
  // }
  // else{
     

  //    $(".msghead").css("display","none");
  //     $(".msg").css("display","none");
  //      $(".imghead").css("display","none");
    
  // }
  var i=0;
  
   var count=<?php echo $count?>;
   console.log('<?php echo $users[1]; ?>')
   console.log('<?php echo json_encode($users); ?>');
    var users = JSON.parse('<?php echo json_encode($users); ?>');

 console.log(users);
// for(i=0;i<count;i++)
// {
//   var src= users[i];
 
//   $(".ll").append("<div class='profile'><h3>"+src+"</h3><img src='uploads/"+src+".jpg' alt='No image available'></div>");
// }
    var c=<?php echo $c?>;

  
    var com1 = JSON.parse('<?php echo json_encode($com1); ?>');
var com2 = JSON.parse('<?php echo json_encode($com2); ?>');

 console.log(users);
for(i=0;i<c;i++)
{
  var src1= com1[i];
   var src2=com2[i];
  $(".msg").append("<div class='wholepoll'><h3>Poll from "+src1+"</h3>   <h2 class='eachmsg'> <span class='pl'>Poll -</span> "+src2+"</h2><div class='pollans'><input type='text' placeholder='your opinion' style='width:450px; height:70px';> <input type='submit' value='Submit' name='send' class='btnform pollsubmit' ></div></div>");
}       



});
</script>
                   <body>
                   <a href="index.php" class="btnform" style="text-decoration: none; position: absolute; top:1em;right: 1em; text-align: center; border:1px solid white;">Logout  </a>
                    <div class="welcome"><h1> Welcome <?php echo $client ?></h1></div>
               
                     <div class="ll"></div>
                    <div class="signup">
    <i class="fa fa-times closesignup"></i>
  <h1><?php echo $msg;?></h1>
  </div>
                    
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="comment" method="POST" class="upform">
<input type="textarea" name="message" style="height: 150px; width: 450px;" class="txtarea" placeholder="Whats in your mind ?">
<input type="submit" id="signup" value="Upload Poll" name="send" class="btnform upbtn" >
                  </form>
                  <hr>
                  
                   <div class="msg">
                       <div class="welcome"><h1> Recent Polls</h1></div>
                   </div>
                   </body>
                 </html>