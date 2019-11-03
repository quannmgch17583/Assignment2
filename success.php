<!DOCTYPE html>
<html>
<body>

<h1>This is the information of all customers who purchase products from the company</h1>

<?php
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
	//you sql query
	$sql = "SELECT name,gender,address FROM payment";
	$stmt = $pdo->prepare($sql);
	//execute the query on the server and return the result set
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
	//display the data 
?>
<ul>
	<?php
		foreach ($resultSet as $row) {
			echo "<li>" .
				$row["name"] . '--'. $row["gender"] . '--' . $row["address"]
			. "</li>";
		}
	?>
</ul>

</body>