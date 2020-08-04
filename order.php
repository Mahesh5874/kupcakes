<?php
$con=mysqli_connect('localhost', 'root', '','my');
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
$name=$_SESSION['username'];

mysqli_close($con);

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="orders.css">
</head>
<body>
	<div class="contact-section3">
      <div class="inner-width3">
        <h1>Add your Delivery Details</h1>
        <form name="login" method="POST" action="orders.php">
				<input type="text" value="<?php echo $name; ?>" class="name" disabled>
				<input type="text" value="<?php echo $email; ?>" class="name" disabled>
				<input type="text" value="<?php echo $pname; ?>" class="name" disabled>

				<input type="number" name="quantity" placeholder="Enter cake amount..." min="1" max="10" class="quantity">
        <textarea rows="1" placeholder="Address" name="address" class="message"></textarea><br>
        <input type="Submit" name="" value="Submit" class="button"><br>


        </form>
        </div>
      </div>
    </div>
<?php } ?>
</body>
</html>
