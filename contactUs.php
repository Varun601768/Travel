<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Contact Us | tourism_management</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/main.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
		
		<?php 
			if(!isset($_SESSION["username"])) {
				include("common/headerLoggedOut.php");
			}
			else {
				include("common/headerLoggedIn.php");
			}
		?>
		
		<div class="spacer">a</div>
		
		<div class="col-sm-12 contactUsWrapper">
			
			<div class="headingOne">
				
				Contact Us
				
			</div>
			
			
		</div> <!-- paymentWrapper -->
		
		<div class="col-xs-12 contactPadding">
			
		<div class="col-sm-1"></div>
		
		<div class="col-sm-5 contactUsExtras">
			
			<div class="col-sm-12 heading">
				
				<span class="bold"><h2>We're located at:</h2></span>
				
				<h4>Kuntikan, Near AJ Hospital, Mangaluru,Karnataka 575004</h4>

				<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.1217958032353!2d74.84252022008886!3d12.899889022716215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba35a71ec57a96f%3A0xb94bfd8199a1260e!2sDreamz%20Tours%20%26%20Travels!5e0!3m2!1sen!2sin!4v1687164486958!5m2!1sen!2sin" width="580" height="376" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p> 
			
			</div>
		</div>


		<?php
				include "contactconnection.php"; // Using database connection file here

				if(isset($_POST['submit']))
				{		
    					$fullname = $_POST['name'];
    					$email = $_POST['email'];
						$sub=$_POST['subject'];
						$msg=$_POST['message'];

    					$insert = mysqli_query($db,"INSERT INTO `inquiry`(`name`, `email`,`subject`, `message`) VALUES ('$fullname','$email','$sub','$msg')");

   						if(!$insert)
    					{
							echo '<script> alert("Failed to Send Message") </script>';
    					}
    					else
   						{
      						echo '<script> alert("Message Sent Successfully") </script>';
    					}
				}

				mysqli_close($db); // Close connection
		?>


    
    	<div class="col-sm-5 contactUsForm"  style="border: 2px solid black;">
			
		<form method="POST">
				
			<label for="name">Full Name:</label>
			<input type="text" class="input" name="name" required/>
			
			<label for="email">E-mail:</label>
			<input type="text" class="input" name="email" required/>
			
			<label for="queries">Subject:</label>
			<textarea class="input" name="subject" required></textarea>
			
			<label for="queries">Message:</label>
			<textarea class="input" name="message" required></textarea>

			<div class="text-center">
				<input type="submit" class="contactButton"  name="submit" value="Submit"/>
			</div>
			
		</form>
			
		</div>

		<!--class for creating space-->	
		<div class="col-sm-1"></div>
		</div>
	
		<div class="col-xs-12 spacer">.</div> <!-- just a dummy class for creating some space -->
		<div class="col-xs-12 spacer">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>









