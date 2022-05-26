<?php

$pdo = new PDO("mysql:host=localhost;dbname=ctg256", "root", "");

$up_id = $_GET['id'];


//update section

if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$number = $_POST['num'];

	$q = "UPDATE users SET name='$name',number='$number' WHERE id='$up_id'";
	$statement = $pdo->prepare($q);
	$statement->execute();
	header("location:index.php");
}

//getdata

$get_data_sql = "SELECT * FROM users WHERE id='$up_id'";
$get_statement = $pdo->prepare($get_data_sql);
$get_statement->execute();
$result = $get_statement->fetchAll();




?>


  <!DOCTYPE html>
  <html>
  <head>
  	<title>update</title>
  </head>
  <body>


  			<?php

  				foreach ($result as $value) {
  								
  			?>
  			<form class="form-group" method="POST" action="">
				<input class="form-control" type="text" name="name" value="<?php echo $value['name']?>"><br>
				<input class="form-control" type="number" name="num"  value="<?php echo $value['number']?>"><br>
				<input class="btn btn-success" type="submit" name="submit" value="update">
		
			</form>

			<?php

				}
			?>
  
  </body>
  </html>