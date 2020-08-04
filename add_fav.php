<?php
$con=mysqli_connect('localhost', 'root', '','kupcakes');
if(!$con){
	 die ( "Connection not success" .mysql_error());
}
else{
session_start();

$id=$_SESSION['id'];
$email=$_SESSION['email'];
$pid=$_SESSION['pid'];
$pname=$_SESSION['pname'];
$price=$_SESSION['price'];
$picture=$_SESSION['picture'];



if($_SESSION['flag']==0){
	$picture=mysqli_real_escape_string($con,$picture);
	$que="INSERT into favourites values($id,'$email',$pid,'$pname',$price,'$picture')";
$add=mysqli_query($con,$que) OR die("ADD FAVOURITE FAILED".mysql_error());
unset($_SESSION['flag']);
}
else{
  $remove=mysqli_query($con,"DELETE from favourites where id=$id and p_id=$pid") OR die("DELETE FAVOURITE FAILED".mysql_error());
  unset($_SESSION['flag']);
}
}

mysqli_close($con);
echo "<script>location.href='product.php';</script>";
?>
