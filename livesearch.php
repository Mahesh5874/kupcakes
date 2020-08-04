<?php

$connect = mysqli_connect("localhost", "root", "", "my");
$output = '';
if(isset($_POST["query"]))
{

	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM products
	WHERE p_name LIKE '%".$search."%'
	OR Description LIKE '%".$search."%'
	OR type LIKE '%".$search."%';";



$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '
	<div class="table-responsive">
	<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Product Name</th>
			<th scope="col">Description</th>
			<th scope="col">Type</th>
			<th scope="col">Image</th>

		</tr>
	</thead>
	<tbody>';
	while($row = mysqli_fetch_array($result))
	{
		$pic=$row["picture"];
		$output .= '
		<tr>
			<th scope="row">'.$row["p_id"].'</th>
			<td>'.$row["p_name"].'</td>
			<td>'.$row["description"].'</td>
			<td>'.$row["type"].'</td>
			<td><img class="searchimg" src="'.$pic.'"></td>
		</tr>';
	}
	$output .= '</tbody></table>';
	echo $output;
}
else
{
	echo 'No product found';
}
}
?>
