<?php


$pdo = new PDO("mysql:host=localhost;dbname=ctg256", "root", "");

if(isset($_GET['delSucc'])){
	echo "Deleted";
}


if(isset($_GET['delete'])){
	$id = $_GET['delete'];

	$del_q = "DELETE FROM users WHERE id='$id'";
	$del_st = $pdo->prepare($del_q);
	$del_st->execute();
	header("location:index.php?delSucc=1");
	
	}

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$number = $_POST['num'];

	//insert begins

	$q = "INSERT INTO users (name,number) VALUES('$name','$number')";
	$statement = $pdo->prepare($q);
	$statement->execute();
	echo "Hoise!";


	//insert end

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>db form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="row">
		<div class="col-4 offset-4" style="padding-top:100px;">

			<form class="form-group" method="POST" action="">
				<input class="form-control" type="text" name="name"><br>
				<input class="form-control" type="number" name="num"><br>
				<input class="btn btn-success" type="submit" name="submit" value="Save">
		
			</form>



<?php

//getdata

$get_data_sql = "SELECT * FROM users";
$get_statement = $pdo->prepare($get_data_sql);
$get_statement->execute();
$result = $get_statement->fetchAll();


?>


			<table border="1" style="width:100%" class="text-center">
				<tr>
					<th>Name</th>
					<th>Number</th>
					<th>action</th>
				</tr>

				<?php 

					foreach ($result as $value) {
					
				 ?>

				<tr>
					<td><?php echo $value['name'];?></td>
					<td><?php echo $value['number'];?></td>
					<td><a class="btn btn-danger btn-sm"href="?delete=<?php echo $value['id'];?>">Delete</a> || <a class="btn btn-primary btn-sm" href="update.php?id=<?php echo $value['id'];?>">update</a></td>
				</tr>

				<?php

					}

				?>
			</table>


		</div>

	</div>


</body>
</html>