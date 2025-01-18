<!Doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Admin Panel | Users </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="js/bootstrap.min.js"></script>
	<style>
		a.btn.btn-info.btn-block.btn-lg {
			width: 460px;
		}

		body {
			margin: 0;
			width: 100%;
			height: 100vh;
			font-family: "Exo", sans-serif;
			background:#b3bef0;
		}




		@import url(https://fonts.googleapis.com/css?family=Oswald:400);

		.navigation {
			width: 100%;
			background-color: black;
		}

		img {
			width: 25px;
			border-radius: 50px;
			float: left;
		}

		.logout {
			font-size: .8em;
			font-family: 'Oswald', sans-serif;
			position: relative;
			right: -18px;
			bottom: -4px;
			overflow: hidden;
			letter-spacing: 3px;
			color: white;
			opacity: 0;
			transition: opacity .45s;
			-webkit-transition: opacity .35s;

		}

		a.button {
			width: 40px;
		}

		.button {
			text-decoration: none;
			float: right;
			padding: 12px;
			margin: 15px;
			color: white;
			width: 25px;
			background-color: #426474;
			transition: width .35s;
			-webkit-transition: width .35s;
			overflow: hidden
		}

		a:hover {
			width: 150px;
		}

		a:hover .logout {
			opacity: .9;
		}

		.button a {
			text-decoration: none;
		}

		.dash-div a button {
			font-size: 15px;
			width: 100px;
			background: #426474;
			font-family: 'FontAwesome';
			color: white;
			margin-top: 15px;
			letter-spacing: 1px;
		}
	</style>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectmeteor";
$UserID = "";
$FullName = "";
$EMail = "";
$Phone = "";
$Username = "";
$Password = "";
$AddressLine1 = "";
$AddressLine2 = "";
$City = "";
$State = "";
$Date = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try {
	$conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (MySQLi_Sql_Exception $ex) {
	echo ("Connection Error");
}
//get data from the form
function getData()
{
	$data = array();

	$data[1] = $_POST['FullName'];
	$data[2] = $_POST['EMail'];
	$data[3] = $_POST['Phone'];
	$data[4] = $_POST['Username'];
	$data[5] = $_POST['Password'];
	$data[6] = $_POST['AddressLine1'];
	$data[7] = $_POST['AddressLine2'];
	$data[8] = $_POST['City'];
	$data[9] = $_POST['State'];
	$data[10] = $_POST['Date'];
	return $data;
}
//search
if (isset($_POST['search'])) {
	$info = getData();
	$search_query = "SELECT * FROM users WHERE UserID = '$info[0]'";
	$search_result = mysqli_query($conn, $search_query);
	if ($search_result) {
		if (mysqli_num_rows($search_result)) {
			while ($rows = mysqli_fetch_array($search_result)) {
				$UserID = $rows['UserID'];
				$FullName = $rows['FullName'];
				$EMail = $rows['EMail'];
				$Phone = $rows['Phone'];
				$Username = $rows['Username'];
				$Password = $rows['Password'];
				$AddressLine1 = $rows['AddressLine1'];
				$AddressLine2 = $rows['AddressLine2'];
				$City = $rows['City'];
				$State = $rows['State'];
				$Date = $rows['Date'];
			}
		} else {
			echo ("No data are available");
		}
	} else {
		echo ("Result error");
	}
}
//insert
if (isset($_POST['insert'])) {
	$info = getData();
	$insert_query = "INSERT INTO `users`(`FullName`, `EMail`, `Phone`, `Username`,`Password`,`AddressLine1`,`AddressLine2`,`City`,`State`,`Date`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]')";
	try {
		$insert_result = mysqli_query($conn, $insert_query);
		if ($insert_result) {
			if (mysqli_affected_rows($conn) > 0) {
				echo ("Data inserted successfully");
			} else {
				echo ("Data not inserted");
			}
		}
	} catch (Exception $ex) {
		echo ("error inserted" . $ex->getMessage());
	}
}
//delete
if (isset($_POST['delete'])) {
	$info = getData();
	$delete_query = "DELETE FROM `users` WHERE UserID = '$info[0]'";
	try {
		$delete_result = mysqli_query($conn, $delete_query);
		if ($delete_result) {
			if (mysqli_affected_rows($conn) > 0) {
				echo ("Data deleted");
			} else {
				echo ("Data not deleted");
			}
		}
	} catch (Exception $ex) {
		echo ("Error in deleting" . $ex->getMessage());
	}
}
//edit
if (isset($_POST['update'])) {
	$info = getData();
	$update_query = "UPDATE `users` SET FullName='$info[1]',EMail='$info[2]',Phone='$info[3]',Username='$info[4]',Password='$info[5]',AddressLine1='$info[6]',AddressLine2='$info[7]',City='$info[8]',State='$info[9]',Date='$info[10]' WHERE UserID = '$info[0]'";
	try {
		$update_result = mysqli_query($conn, $update_query);
		if ($update_result) {
			if (mysqli_affected_rows($conn) > 0) {
				echo ("Data updated");
			} else {
				echo ("Data not updated");
			}
		}
	} catch (Exception $ex) {
		echo ("Error in updating" . $ex->getMessage());
	}
}

?>


<body>
	<div class="container-fliud">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="dash-div">
						<a href="../admin/">
							<button>Dashboard <i class="fa fa-dashboard"></i></button>
						</a>
					</div>
					<!-- <h1 class="navbar-brand"> Tourism Management System</h1>-->
				</div>
				<div class="collapse navbar-collapse" id="nav">
					<ul class="nav navbar-nav" style="float:right">
						<!--
        	  <li><a href="Home.php">HOME</a></li>
			  <li><a href="users_add.php">USERS</a></li>
              <li><a href="hotels_add.php">ADD HOTELS</a></li>
              <li><a href="hotelbookings_view.php">HOTEL BOOKINGS</a></li>
              <li><a href="flights_add.php">ADD FLIGHTS</a></li>
              <li><a href="flightbookings_view.php">FLIGHT BOOKINGS</a></li>
              <li><a href="trains_add.php">ADD TRAINS</a></li>
              <li><a href="trainbookings_view.php">TRAIN BOOKINGS</a></li>
			  <h3><a href="adminLogout.php">LOGOUT</a></h3>
	-->
						<div class="navigation">
							<a class="button" href="adminLogout.php">
								<img src="https://pbs.twimg.com/profile_images/378800000639740507/fc0aaad744734cd1dbc8aeb3d51f8729_400x400.jpeg">
								<div class="logout">LOGOUT</div>
							</a>
						</div>
					</ul>
				</div>
			</div>
		</nav>
	</div>



	<div class="container-fluid">
		<div class="row mx-5 my-5" style="display: flex;justify-content: center;">
			<div class="col-lg-4">

				<form action="signupActions.php" method="POST">

					<label for="name">Full Name:</label>
					<input type="text" class="form-control" name="name" placeholder="Enter your full name here" id="fullname" required>

					<label for="email">E-mail:</label>
					<input type="email" class="form-control" name="email" placeholder="Enter your email here" required>

					<label for="phone">Phone:</label>
					<input type="text" class="form-control" name="phone" placeholder="Enter your phone no. here" id="phone" required>

					<label for="username">Username:</label>
					<input type="text" class="form-control" name="username" placeholder="Enter a username here" id="username" required>

					<p id="usernameExists" style="font-size: 1.2em; color: red; font-weight: 400; margin-top: -1.75em; text-align: center; background: rgba(0,0,0,0.4); display: none;">This username already exists. Please choose a different one.</p>

					<label for="password">Password:</label>
					<input type="password" class="form-control" name="password" placeholder="Enter a password here" id="password" required>

					<label for="repeatPassword">Repeat Password:</label>
					<input type="password" class="form-control" name="repeatPassword" placeholder="Enter the same password again" id="repeatPassword" required>

					<label for="addressLine1">Address Line 1:</label>
					<input type="text" class="form-control" name="addressLine1" placeholder="Enter your House No./ Flat No. or Apartment No." required>

					<label for="addressLine2">Address Line 2:</label>
					<input type="text" class="form-control" name="addressLine2" placeholder="Enter the name of your Lane, Locality" required>

					<label for="city">City:</label>
					<input type="text" class="form-control" name="city" placeholder="Enter the name of your city here" id="city" required>

					<label for="addressLine2">State:</label>
					<input type="text" class="form-control" name="state" placeholder="Enter the name of your state here" id="state" required>

					<br>
					<br>

					<div>
						<input type="submit" class="btn btn-info btn-block btn-lg" name="signup" value="Add" id="signupButton" style="background: green;">
					</div>

					<div>
						<br>
						<br>
						<!--<a href="..\Management\useradd.php"><input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add"></a>-->
						<a href="users_update.php" class="btn btn-info btn-block btn-lg">Update | Delete | Search</a>
					</div>
				</form>
			</div>
		</div>
		<br>
		<br>

		<div class="col-lg-8">
			<h1 class="text-danger text-center" style="font-weight:bold">USERS DATA</h1>
			<hr>
			<br>
			<br>
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "projectmeteor";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT UserID,FullName,EMail,Phone,Username,Password,AddressLine1,AddressLine2,City,State,Date FROM users";
			$result = $conn->query($sql);

			echo "<div class='col-xs-6'>
<table class='table table-striped table-bordered table-hover py-5' style='width:200%; border: 4px solid black; text:white; text-align: center;'>
<tr class='text-centre text-white'style='font-size:20px; background:black;'>
<th>UserID</th>
<th>FullName</th>
<th>EMail</th>
<th>Phone</th>
<th>Username</th>
<th>Password</th>
<th>AddressLine1</th>
<th>AddressLine2</th>
<th>City</th>
<th>State</th>
<th>Date</th>

</tr>
</div>";

			if ($result->num_rows > 0) {
				// output data of each row
				while ($row = $result->fetch_assoc()) {

					echo "<tr>";
					echo "<td>" . $row['UserID'] . "</td>";
					echo "<td>" . $row['FullName'] . "</td>";
					echo "<td>" . $row['EMail'] . "</td>";
					echo "<td>" . $row['Phone'] . "</td>";
					echo "<td>" . $row['Username'] . "</td>";
					echo "<td>" . $row['Password'] . "</td>";
					echo "<td>" . $row['AddressLine1'] . "</td>";
					echo "<td>" . $row['AddressLine2'] . "</td>";
					echo "<td>" . $row['City'] . "</td>";
					echo "<td>" . $row['State'] . "</td>";
					echo "<td>" . $row['Date'] . "</td>";

					echo "</tr>";
				}
			} else {
				echo "0 results";
			}

			$conn->close();
			?>
		</div>
	</div>
</body>

</html>