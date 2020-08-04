
<?php

//creating a connection variable
$con=mysqli_connect('localhost', 'root', '');
if(!$con){
	 die ( "Connection not success" .mysql_error());
}

//for selecting database
$db = mysqli_select_db($con,'my');
//creating database if database does not exists
if(!$db){
	$create_db="create database kupcakes";
	$database=mysqli_query($con,$create_db);
	if(!$database){
		die("Database creation failed ".mysql_error());
	}
	//selecting database after creating
	else{
		$db = mysqli_select_db($con,'my');

	}
}

//Fetching data from SIGNUP form
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['emailid'];
$pass=$_POST['pass'];

//creating table for registered user if it already does not exists
$create = "CREATE TABLE if not exists register(
				id int PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) UNIQUE,
        password varchar(50)
        )";

$register=mysqli_query($con,$create);
if(!$register){
	 die ( "Create not success" .mysql_error());
}
//for inserting values retrieved from form in the database
$query = "INSERT into register(firstname,lastname,email,password) values('$fname','$lname','$email','$pass');";
$done =mysqli_query($con,$query);
if(!$done){
	 die ( "insert not success" .mysql_error());
}
else{
	echo "User entered successful";
}

//closing the connection with database
mysqli_close($con);
echo "<script>location.href='login.html'</script>";
?>
