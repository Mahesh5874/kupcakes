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


$address=$_POST['address'];

$quantity=$_POST['quantity'];
$cost= $quantity * $price;
date_default_timezone_set('Asia/Kolkata');
$datym=date("Y-m-d h:i:sa");
$datym=mysqli_real_escape_string($con,$datym);


$picture=mysqli_real_escape_string($con,$picture);
$que="INSERT into orders(id,email,p_id,p_name,price,quantity,cost,picture,datym) values($id,'$email',$pid,'$pname',$price,$quantity,$cost,'$picture','$datym')";
$add=mysqli_query($con,$que) OR die("ORDER FAILED".mysql_error());
if($add){
$dat=date('Y-m-d h:i:sa', strtotime('+6 hour',strtotime($datym)));

	require './phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$mail->isSMTP();
	//$mail->SMTPDebug = 4;
	$mail->Host='smtp.gmail.com';
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';

	$mail->Username='info.kupcakes@gmail.com';
	$mail->Password='';

	$mail->setFrom('info.kupcakes@gmail.com');
	$mail->addAddress($email);
	$mail->addReplyTo('info.kupcakes@gmail.com');
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

	$mail->isHTML(true);
	$mail->Subject='Your Delicious Order';
	$mail->Body='<h1 align=center>GREETINGS FROM KUPCAKES</h1>
                <br><h3>We have received an order of '.$quantity.'<br> ' .$pname. ' on '.$datym.' <br>with address:' . $address.'. Total cost=₹'. $cost. '<br>Delivery time:.'.$dat.' </h3>';
	if($mail->send()){
		echo "<script>alert('Your order has been received and correspoding details has been mailed');location.href='product.php';</script>";

	}
	else{
		echo "<script>alert('Some internal problem, we are on it');location.href='product.php';</script>";

	}



}
mysqli_close($con);
}
?>
