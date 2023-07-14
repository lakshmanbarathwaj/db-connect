<?php 
$uname=$_POST['uname'];
$upswd=$_POST['upswd'];
if (!empty($uname)&&!empty($upswd))
{ $host="localhost";
  $dbusername="aravind";
  $dbpassword="nutella@37";
  $dbname="aravind";
 //create correction
 $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
 if(mysqli_connect_error())
 { die('Connect error ('. mysqli_connect_errno() .')' . mysqli_connect_error());
 }
 else 
 {//checking the user name 
 $SELECT="SELECT uname1 From register Where uname1 = ? Limit 1";
 //PREPARE STATEMENT 
 $stmt=$conn->prepare($SELECT);
 $stmt->bind_param("s",$uname);
 $stmt->execute();
 $stmt->bind_result($uname);
 $stmt->store_result();
 $rnum=$stmt->num_rows;
 //checking user name 
 if($rnum==0)
 {$stmt->close();
 echo"user name no found<br>";
 }
 else
 {echo"user name found <br>";
 $checking the username 
 $SELECT="SELECT upswd1 from register Where uname1 = ?";
 //PREPARE STATEMENT
 $stmt=$conn->prepare($SELECT);
 $stmt->bind_param("s",$uname);
 $stmt->execute();
 $stmt->bind_result($pswd);
 $stmt->fetch();
 echo"<br> registered  password:" .$pswd;
echo"<br> entered password:".$upswd;
if ($upswd==$pswd)
{echo "<br>correct password <br> successfullly logged in ";}
else{
echo"<br>incorrect password";}}
$stmt->close();
$conn->close();
}}
else{
echo"all files need to be filled ";
die();
}
?>