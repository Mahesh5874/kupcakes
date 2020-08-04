<?php

session_start();
$p_id=$_SESSION['opid'];
$p_name=$_SESSION['pname'];
$price=$_SESSION['price'];
$picture=$_SESSION['picture'];
$ratings=$_SESSION['ratings'];
$description=$_SESSION['description'];

//for database connection
$con=mysqli_connect('localhost', 'root', '','my');
if(!$con){
	 die ( "Connection not success" .mysql_error());
}

//creating table for review if it does not exists
$create = "CREATE TABLE if not exists review(
				id int,
				email VARCHAR(50),
				p_id int,
				review VARCHAR(3000) NOT NULL,
				ratings float,
				Foreign key(id) references register(id),
				Foreign key(email) references register(email),
				Foreign key(p_id) references products(p_id)
			)";
			$revi=mysqli_query($con,$create);
			if(!$revi){
				 die ( "Create not success" .mysql_error());
			}


						//creating table for favourites if it does not exists
						$create_fav= "CREATE TABLE if not exists favourites(
													id int,
													email VARCHAR(50),
													p_id int,
													p_name varchar(30),
													price int,

													picture varchar(100),

													Foreign key(id) references register(id),
													Foreign key(email) references register(email),
													Foreign key(p_id) references products(p_id)
												)";
												$carr=mysqli_query($con,$create_fav);
												if(!$carr){
													 die ( "Create not success" .mysql_error());
												}



//review
//review is successfull only if user is logged in
if( isset($_POST['review']) ){
	if( isset(($_SESSION['username'])) ){
		$id=$_SESSION['id'];
		$email=$_SESSION['email'];
		$review=$_POST['review'];
		$rating=$_POST['rating'];
		//to check if the logged in user has already inserted a review
		$check=mysqli_query($con,"select * from review where id=$id and p_id=$p_id") OR die(mysql_error());
		$check1=mysqli_fetch_assoc($check);
		//for user inputting review for the first time
		if($check1==NULL){
			$rev="INSERT into review values($id,'$email',$p_id,'$review',$rating) ";
			$in=mysqli_query($con,$rev);

			if(!$in){
				die ( "Insert not success" .mysql_error());
			}
			else{
				echo "<script> alert('Your review has been added'); </script>";
			}
		}
		//if review is already inputted for the logged in user then it gets updated
		else{
		$rev="Update review set review='$review',ratings=$rating where id=$id and p_id=$p_id";
		$in=mysqli_query($con,$rev);
		if(!$in){
			 die ( "Update not success" .mysql_error());
		}
		else{
			echo "<script> alert('Your previous review has been updated'); </script>";
		}
}
	//for calculating average rating from the all the reviews
	$rat=mysqli_query($con,"select avg(ratings) from review where p_id=$p_id") or die(mysql_error());
	$avg_rat=mysqli_fetch_array($rat);
	//update the product ratings after a user has added a rating
	$ratings=round($avg_rat[0],2);
	$update_rat=mysqli_query($con,"update products set ratings=$ratings where p_id=$p_id ");




	}
//unsuccessful review, because the user is not logged in
else{
		echo "<script> alert('Please login first');</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head >

	<link rel="icon" type="image/png" href="css\images\favicon.png">
	<title><?php echo $p_name; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css\product.css?version=6">

</head>
<body>

	<div id='cartinfo'>
		im cart, nice to meet you.
		<div id='close' onclick="document.getElementById('cartinfo').style.display='none'">Close</div>
	</div>

  <h1 class="pname"><u><?php echo $p_name; ?></u></h1>
  <div class='info'>

    <img id='img' src="<?php echo $picture; ?>">

    <div class="detail">
				<div class='rating'>
      	Ratings:<?php
				if($ratings){
				for($i=1; $i<=5;$i++){
					if($i<=$ratings){
					echo " <img src='css\images\star1.png'>";
				}
				else{
					echo " <img src='css\images\star.png'>";
				}
			}
		}
		else{
			echo " Not available";
		}
			 ?>
			</div>
			<div class='price'>
				Price:<?php echo $price; ?>
			</div>

		<div id='descriptions'>
      <u>Description: </u><?php echo $description; ?>
		</div>
		<div id='cart'>
			<div class="fav">
				<?php
				if( isset($_SESSION['id']) ){
				$id=$_SESSION['id'];
				$check=mysqli_query($con,"select * from favourites where id=$id and p_id=$p_id") OR die(mysql_error());
				$check1=mysqli_fetch_array($check);
				//for user inputting review for the first time

				if($check1[0]==''){
					$_SESSION['flag']=0;
					echo "<img class='add_fav' src='products\like.png'  onclick='changepage();' >";
				}
				else{
					$_SESSION['flag']=1;
					echo "<img class='add_fav' src='products\blike.png'  onclick='changepage();' >";

				}
			}
				?>
				<script>
					function changepage(){
						location.href='add_fav.php';

					}
				</script>

			</div>
      <input type="button" value="DONE" onclick=location.href='menu.php'>
		</div>
    </div>
  </div>
<div class="review_box">
	<div class="add_review">
	<h2>Add your own review</h2>
	<form method='post' action="<?=$_SERVER['PHP_SELF'];?>">
		<input type='text' name='review' placeholder="add review here..." required>
		<select  name='rating' >
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
		<input type='submit'>
	</form>
</div>
<?php
$que="SELECT * FROM review where p_id=$p_id";
$data = mysqli_query($con,$que) or die('No Records Found');
?>
<div class='reviews'>
		<p>Reviews of Verified user </p>
	<?php
	while($info = mysqli_fetch_assoc( $data)){
		$user_id=$info['id'];
		$user_email=$info['email'];
		$pro_id=$info['p_id'];
		$pro_review=$info['review'];
		$pro_rating=$info['ratings'];


	?>

<div class='review'>

<div class='rev_user'>
	<?php echo "<img src='css\images\capture.png'>  ".$user_email; ?>
</div>
<div class=rev_rat>
Ratings:<?php
for($i=1; $i<=5;$i++){
	if($i<=$info['ratings']){
	echo " <img src='css\images\star1.png' >";

}
else{
	echo " <img src='css\images\star.png' >";
}
}


?>

</div>
	<div class='rev_review'>
	<?php echo 'Review: '.$pro_review; ?>
	</div>
</div>
<?php }?>
</div>


<?php
mysqli_close($con);
?>
</body>
