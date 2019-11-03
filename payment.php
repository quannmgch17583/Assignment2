<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method = "post" action = "doPayment.php">
		<h1>Thank you for choosing this product</h1>
		<h2>Please enter your information to get contacted</h2>
		<table>
			<tr>
				<td>Name: </td>
				<td><input type = "text" name= "txtName"></td>
			</tr>
			
			<tr>
				<td>DOB: </td>
				<td><input type = "Date" name = "dob"/></td>
			</tr>

			<tr>
				<td>Gender: </td>
				<td>
					<input type="radio" name="gender" value="Male">Male
					<input type="radio" name="gender" value="Female">Female
				</td>
			</tr>

			<tr>
				<td>Address: </td>
				<td><input type="text" name="txtAdd"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type = "submit" name = "Submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>