<!DOCTYPE html>

<html lang="en">

<!-- HEAD TAG STARTS -->

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>Sign up | tourism_management</title>

	<link href="css/main.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-select.css" rel="stylesheet">
	<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-select.js"></script>
	<script src="js/bootstrap-dropdown.js"></script>
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/moment-with-locales.js"></script>
	<script src="js/bootstrap-datetimepicker.js"></script>

</head>

<style>
	
	body {
		text-align: center;
		padding: 40px 0;
		background: #ABCDCA;
	}

	.warning-msg img {
		width: 200px;
		height: 200px;
	}

	h1 {
		color: #88B04B;
		font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
		font-weight: 900;
		font-size: 40px;
		margin-bottom: 10px;
	}

	p {
		color: #404F5E;
		font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
		font-size: 20px;
		margin: 0;
	}

	i {
		color: #9ABC66;
		font-size: 100px;
		line-height: 200px;
		margin-left: -15px;
	}

	.card {
		background: white;
		padding: 60px;
		border-radius: 4px;
		box-shadow: 0 2px 3px #C8D0D8;
		display: inline-block;
		margin: 0 auto;
	}

	button {
		background-color: #90b459;
		width: 100px;
		height: 50px;
		border: none;
		color: white;
		font-size: 20px;
		font-family: 'Times New Roman', Times, serif;
		border-radius: 10px;
	}
</style>

<body>

	<?php

	date_default_timezone_set("Asia/Kolkata");
	$date = date('l jS \of F Y \a\t h:i:s A');

	require("../php/PasswordHash.php");
	$hasher = new PasswordHash(8, false);

	$fullName = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$addressLine1 = $_POST["addressLine1"];
	$addressLine2 = $_POST["addressLine2"];
	$city = $_POST["city"];
	$state = $_POST["state"];

	$hash = $hasher->HashPassword($password);

	$servername = "localhost";
	$usernameConn = "root";
	$passwordConn = "";
	$dbname = "projectmeteor";

	// Creating a connection to projectmeteor MySQL database
	$conn = new mysqli($servername, $usernameConn, $passwordConn, $dbname);

	// Checking if we've successfully connected to the database
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$checkUserExistSQL = "SELECT * FROM `users` WHERE Username='$username'";
	$checkUserExistQuery = $conn->query($checkUserExistSQL);
	$getResult = $checkUserExistQuery->fetch_assoc();

	if ($getResult == NULL) { //checks if user with the same username does not exist

		//insert query
		$insertDataSQL = "INSERT INTO `users`(FullName,EMail,Phone,Username,Password,AddressLine1,AddressLine2,City,State,Date) VALUES('$fullName','$email','$phone','$username','$hash','$addressLine1','$addressLine2','$city','$state','$date')";
		$insertDataQuery = $conn->query($insertDataSQL);

		if ($insertDataQuery) { ?>

			<div class="card">
				<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
					<i class="checkmark">✓</i>
				</div>
				<h1>Success</h1>
				<p>user added successfully<br />
					<a href="../admin/"><button>OK</button></a>
			</div>

		<?php } else { ?>

			<div class="card">
				<div class="warning-msg"><img src="../images/warning.png" alt=""></div>
				<h1 style="color: red;">warning</h1>
				<p> Sorry we couldn't Add User.<br> Please try again in a while.<br></p>
				<a href="../admin/"><button style="background: red;">OK</button></a>
			</div>

		<?php } ?>

	<?php } else { //if user with the same username exists 
	?>

		<div class="card">
			<div class="warning-msg"><img src="../images/warning.png" alt=""></div>
			<h1 style="color: red;">warning</h1>
			<p> Failed to add user.<br> An user with this username already exists.<br></p>
			<a href="../admin/"><button style="background: red;">OK</button></a>
		</div>

	<?php } ?>

</body>
</html>