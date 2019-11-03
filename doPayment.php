<!DOCTYPE html>
<html>
<head>
	<title>Processing</title>
</head>
<body>
	<?php 
		$name = $_POST["txtName"];	
		$birthday = $_POST["dob"];
		$gender = $_POST["gender"];
		$address =$_POST["txtAdd"];
		
		//Refere to database 
	   $db = parse_url(getenv("DATABASE_URL"));
	   $pdo = new PDO("pgsql:" . sprintf(
	        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
	        $db["host"],
	        $db["port"],
	        $db["user"],
	        $db["pass"],
	        ltrim($db["path"], "/")
	   ));
	   $data = [
		    'name' => $name,
		    'dob' => $birthday,
		    'gender' => $gender,
		    'address' => $address
		];
		$stmt =  $pdo->prepare("INSERT INTO payment(name,dob,gender,address) VALUES (:name,:dob,:gender,:address)");	
		$stmt->execute($data);

	 ?>
	 <h2>Thank you <?php echo $name?>  for choosing us!
	 </h2>
	 <h3>
	 	Please check your information again
	 </h3>
	 <ul>
	 	<li>Your birthday: <?php echo $birthday?></li>
	 	<li>Your gender: <?php echo $gender?></li>
	 	<li>Your address: <?php echo $address?></li>
	 </ul>
	 <a href="index.php">Index</a>
</body>
</html>