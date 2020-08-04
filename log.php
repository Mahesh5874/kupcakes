
<?php
//for login
$em=$_POST['email'];
$ps=$_POST['pass'];

//creating a connection variable
$con=mysqli_connect('localhost', 'root', '','my');
if(!$con){
  echo "con cond";
	 die ( "Connection not success" .mysql_error());
}


$que="SELECT * FROM register where email='".mysqli_real_escape_string($con,$em)."' and password='".mysqli_real_escape_string($con,$ps)."'";
//$que="SELECT * FROM register where email='".$em."' and password='".$ps."'";

$data = mysqli_query($con,$que) or die('No Records Found');
$info = mysqli_fetch_assoc($data);
session_start();
$_SESSION['id']=$info['id'];
$_SESSION['username']=$info['firstname'];
$_SESSION['email']=$info['email'];

//echo '<a href="menu.php" id="menu">Menu</a>';

if(!isset($_SESSION['username'])){
  echo "Wrong username";
  echo "<script>location.href='login.html'</script>";
}
else{
  echo "hii ".$_SESSION['username'];
  echo "email-".$_SESSION['email'];
  echo "<script>location.href='index.php'</script>";
}

mysqli_close($con);

?>
