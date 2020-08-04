<?php


//starting a session for logged in user
if( isset($_POST['pid']) ){
	session_start();
	$_SESSION['pid']=$_POST['pid'];
	$p_id=$_SESSION['pid'];
}


$con=mysqli_connect('localhost', 'root', '','my');
if(!$con){
	 die ( "Connection not success" .mysql_error());
}


$create_orders= "CREATE TABLE if not exists orders(
							id int,
							email VARCHAR(50),
							p_id int,
							p_name varchar(30),
							price int,
							quantity int,
							cost float,
							picture varchar(100),
							datym DateTime,
							Foreign key(id) references register(id),
							Foreign key(email) references register(email),
							Foreign key(p_id) references products(p_id)
						)";

						$carr=mysqli_query($con,$create_orders);
						if(!$carr){
							 die ( "Create not success" .mysql_error());
						}

						//fetching data for the product selected
$pro_data = mysqli_query($con,"SELECT * FROM products where p_id=$p_id") or die('No Records Found');
$info = mysqli_fetch_assoc($pro_data);
$p_id=$info['p_id'];
$p_name=$info['p_name'];
$description=$info['description'];
$price=$info['price'];
$ratings=$info['ratings'];
$picture=$info['picture'];





$_SESSION['opid']=$p_id;
$_SESSION['pname']=$p_name;
$_SESSION['price']=$price;
$_SESSION['picture']=$picture;
$_SESSION['ratings']=$ratings;
$_SESSION['description']=$description;

echo "<script>location.href='order.php'</script>";
?>