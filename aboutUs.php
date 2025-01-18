<?php session_start(); ?>

<?php
	require_once('initialize.php');
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>About Us | tourism_management</title>
    
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
		
		<div class="col-sm-12 aboutUsWrapper">
			
			<div class="headingOne">
				
				About Us
				
			</div>
			
			<section class="page-section" id="about">
	        <div class="container">
		
		<div>
			<div class="card w-100">
				<div class="card-body" style="font-size: 20px;">
				<?php echo file_get_contents(base_app.'about.html') ?>

				<center>
					<video id="myMovie" style="max-width: 100%; max-height: 400px; cursor: pointer;" muted autoplay loop>
          			<source src="images/carousel/Project 2.mp4"/>
					</video>

					<script>
						 function loadVideo(){
   						 myMovie=document.getElementById('myMovie');
    					 myMovie.addEventListener('click', playOrPause, false);
						}
						function playOrPause() {
    					if (!myMovie.paused && !myMovie.ended){
        				myMovie.pause();
    					} else {
        				myMovie.play();
    					}
						}
						window.addEventListener('load',loadVideo,false);
					</script>
				</center>

				<h3>Thanks for being a part of this most exciting adventure journey with Dream Tour And Travels.</h3>


			</div>
		</div>
	</div>
</section>


		</div> <!-- paymentWrapper -->
	
	<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>

