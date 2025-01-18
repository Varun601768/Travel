<!DOCTYPE html>

<html lang="en">

<!-- HEAD TAG STARTS -->

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>Sign Up | tourism_management</title>

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

<!-- HEAD TAG ENDS -->



<!------------------------------------------------------------------------------------------------------
		
		
			  ADD CONDITION TO PREVENT USERS FROM SIGNING UP IN CASE THE CHOSEN USERNAME ALREADY EXISTS
			  										
		------------------------------------------------------------------------------------------------------->




<!-- BODY TAG STARTS -->

<body>

	<div class="container-fluid">

		<div class="signup">

			<div class="col-sm-12">

				<div class="heading text-center">
					Sign Up
				</div>

			</div>

			<div class="col-sm-6 col-sm-offset-3">

				<div class="containerBox">

					<form action="signupAction.php" method="POST">

						<label for="name">Full Name:</label>
						<input type="text" class="input" name="name" placeholder="Enter your full name here" id="fullname" pattern=[A-Z\sa-z]{3,20} required>

						<label for="email">E-mail:</label>
						<input type="email" class="input" name="email" placeholder="Enter your email here" required>

						<label for="phone">Phone:</label>
						<input type="text" class="input" name="phone" placeholder="Enter your phone no. here" id="phone" maxlength="10" pattern="[789][0-9]{9}" required>

						<label for="username">Username:</label>
						<input type="text" class="input" name="username" placeholder="Enter a username here" id="username" required>

						<p id="usernameExists" style="font-size: 1.2em; color: red; font-weight: 400; margin-top: -1.75em; text-align: center; background: rgba(0,0,0,0.4); display: none;">This username already exists. Please choose a different one.</p>

						<label for="password">Password:</label>
						<input type="password" class="input" name="password" placeholder="Enter a password here" id="password" required>

						<label for="repeatPassword">Repeat Password:</label>
						<input type="password" class="input" name="repeatPassword" placeholder="Enter the same password again" id="repeatPassword" required>

						<label for="addressLine1">Address Line 1:</label>
						<input type="text" class="input" name="addressLine1" placeholder="Enter your House No./ Flat No. or Apartment No." required>

						<label for="addressLine2">Address Line 2:</label>
						<input type="text" class="input" name="addressLine2" placeholder="Enter the name of your Lane, Locality" required>

						<label for="city">City:</label>
						<input type="text" class="input" name="city" placeholder="Enter the name of your city here" id="city" required>

						<label for="addressLine2">State:</label>
						<select class="input" name="state" placeholder="Enter the name of your state here" id="state" required style=" color:black;">
							<option value="Andhra Pradesh">Andhra Pradesh</option>
							<option value="Arunachal Pradesh">Arunachal Pradesh</option>
							<option value="Assam">Assam</option>
							<option value="Bihar">Bihar</option>
							<option value="Chhattisgarh">Chhattisgarh</option>
							<option value="Gujarat">Gujarat</option>
							<option value="Haryana">Haryana</option>
							<option value="Himachal Pradesh">Himachal Pradesh</option>
							<option value="Jammu and Kashmir">Jammu and Kashmir</option>
							<option value="Goa">Goa</option>
							<option value="Jharkhand">Jharkhand</option>
							<option value="Karnataka">Karnataka</option>
							<option value="Kerala">Kerala</option>
							<option value="Madhya Pradesh">Madhya Pradesh</option>
							<option value="Maharashtra">Maharashtra</option>
							<option value="Manipur">Manipur</option>
							<option value="Meghalaya">Meghalaya</option>
							<option value="Mizoram">Mizoram</option>
							<option value="Nagaland">Nagaland</option>
							<option value="Odisha">Odisha</option>
							<option value="Punjab">Punjab</option>
							<option value="Rajasthan">Rajasthan</option>
							<option value="Sikkim">Sikkim</option>
							<option value="Tamil Nadu">Tamil Nadu</option>
							<option value="Telangana">Telangana</option>
							<option value="Tripura">Tripura</option>
							<option value="Uttarakhand">Uttarakhand</option>
							<option value="Uttar Pradesh">Uttar Pradesh</option>
							<option value="West Bengal">West Bengal</option>
							<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
							<option value="Chandigarh">Chandigarh</option>
							<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
							<option value="Daman and Diu">Daman and Diu</option>
							<option value="Delhi">Delhi</option>
							<option value="Lakshadweep">Lakshadweep</option>
							<option value="Puducherry">Puducherry</option>
						</select>


						<div class="col-sm-12 text-center">
							<input type="submit" class="button" name="signup" value="Sign Up" id="signupButton">
						</div>

					</form>

					<div class="col-sm-12 text-center">
						<div class="loginPrompt">
							Already have an account? <a href="login.php"><span class="dots">Login</span></a> instead.
						</div>
					</div>

				</div>

			</div>

		</div>

	</div> <!-- container-fluid -->

</body>


<!-- BODY TAG ENDS -->

</html>