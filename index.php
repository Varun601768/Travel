<?php session_start(); ?> 


<!DOCTYPE html>

<html>





	<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<title>Home | tourism_management</title>
	
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/hover-min.css" rel="stylesheet"/>
	<link href="css/main.css" rel="stylesheet"/>
   	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>

	<!--animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
	
	</head>

	<style>

	.home .popularDestinationsContainer .destinationHolder .heading {
    font-size: 1.25em;
    font-family: "Raleway", "sans-serif";
    text-align: center;
    margin-top: 1em;
    color: #0a0a0a;
    font-weight: 1000;
}


.heading {
      text-align: center;
      font-size: 2.5rem;
      padding: 3rem 0;
      font-family: sans-serif;
    }

    .counter-container {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      flex-wrap: wrap;
      padding: 2rem 0;
    }

    .social {
      width: 20%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 1rem 0;
    }

    .social-icon {
      font-size: 2rem;
      color: #fff;
      border-radius: 50%;
    }

    .social-icon i {
      padding: 0.7rem;
      border-radius: 50%;
    }

    .fa-thumbs-up {
      background: #c4302b;
    }

    .fa-user {
      background: #00acee;
    }

    .fa-heart{
      background: red;
    }

    .fa-star{
      background:white;
    }

    .social p {
      font-size: 1.5rem;
      font-family: sans-serif;
      padding: 10px 0;
    }

    .social h3 {
      font-size: 70px;
      font-weight: 700;
      font-family: "Nunito", sans-serif;
    }


	</style>

	
	<body>
	
		<div class="col-xs-12 home">
		
			<!-- HEADER SECTION STARTS -->
				
			<div class="col-sm-12">
				
				<div class="header">
					
					<?php
					
					if(!isset($_SESSION["username"])) {
						include("common/headerTransparentLoggedOut.php");
					}
					else {
						include("common/headerTransparentLoggedIn.php");
					}
					
					?>
				
				</div> <!-- header -->
			
			</div> <!-- col-sm-12 -->
				
			<!-- HEADER SECTION ENDS -->
	
			<!-- carousel -->
		
			<div class="col-xs-12 banner">
		
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
		  	
			  	<ol class="carousel-indicators">
			   		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			   		<li data-target="#myCarousel" data-slide-to="1"></li>
			   		<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
			  	</ol>
			
			   	<div class="carousel-inner">
			   	
			    	<div class="item active">
			    	  <img src="images/carousel/image1.jpg" alt="Image1">
			    	</div>
			    	
			    	<div class="item">
			    	  <img src="images/carousel/image2.jpg" alt="Image2">
			    	</div>
				<!--
			    	<div class="item">
			    	  <img src="images/carousel/image3.jpg" alt="Image3">
			    	</div>
				-->

					<div class="item">
			    	  <img src="images/carousel/flight.jpg" alt="Image3">
			    	</div>

					<div class="item">
			    	  <img src="images/carousel/train.jpg" alt="Image3">
			    	</div>
			    
			  	</div>
				
			   	<a href="#myCarousel" class="left carousel-control" data-slide="prev">
			    	<span class="glyphicon glyphicon-chevron-left"></span>
			    </a>
			    <a href="#myCarousel" class="right carousel-control" data-slide="next">
			        <span class="glyphicon glyphicon-chevron-right"></span>
			    </a>
			    
			</div>
			
		</div> <!-- banner -->
		

			<!---icons---->
			<div class="col-xs-12 popularDestinationsContainer">
				
				<div class="col-xs-12 destinationHolder">
				
					<div class="col-xs-12 destinationQuote" style="font-weight:700">
						What would you like to book today?
					</div>
					
					<div class="col-xs-12 containerGrids hvr-buzz-out">
					
						<a href="hotels.php" style="color: black;">
						
						<div class="col-xs-12 icons text-center">
							<img src="images/icons/hotels.png"  style="width:300px;height:250px"  alt="hotels" class="iconsDim text-center"/>
						</div>
						
						<div class="col-xs-12 heading">
							Hotels
						</div>
						
						</a>
						
					</div>
					
					
					<div class="col-xs-12 containerGrids hvr-buzz-out">
						<a href="flights.php" style="color: black;">
							
							<div class="col-xs-12 icons text-center">
								<img src="images/icons/flight1.png" style="height:250px;width:500px" alt="flights" class="iconsDim text-center"/>
							</div>
							
							<div class="col-xs-12 heading">
								Flights
							</div>
							
						</a>
						
					</div>

					
					<div class="col-xs-12 containerGrids hvr-buzz-out">
						<a href="trains.php" style="color: black;">
							
							<div class="col-xs-12 icons text-center">
								<img src="images/icons/goods.png" style="height:250px;width:400px" alt="trains" class="iconsDim text-center"/>
							</div>
							
							<div class="col-xs-12 heading">
								Trains
							</div>
							
						</a>
							
					</div>


					<div class="col-xs-12 containerGrids hvr-buzz-out">
						<a href="bus.php" style="color: black;">
							
							<div class="col-xs-12 icons text-center">
								<img src="images/icons/busss.png" style="width:500px;height:250px" alt="trains" class="iconsDim text-center"/>
							</div>
							
							<div class="col-xs-12 heading">
								Bus
							</div>
							
						</a>
							
					</div>
			
				</div>

				<!--popular destinations-->
			
			<div class="col-xs-12 popularDestinationsContainer">
				
				<div class="col-xs-12 destinationHolder">

				
                <!-- Services-->
				<div class="container">
	<div class="holiday">

	
	<?php require_once('configxx.php'); ?>
  	<body class="hold-transition layout-top-nav" >
     <?php $page = isset($_GET['page']) ? $_GET['page'] : 'portal';  ?>
     <?php 
        if(!file_exists($page.".php") && !is_dir($page)){
            include '404.html';
        }else{
          if(is_dir($page))
            include $page.'/index.php';
          else
            include $page.'.php';

        }
      ?>
    
	</div>
</div>



				<!--
				
					<div class="col-xs-12 destinationQuote">
					
						Popular Destinations
						
					</div>

					<div class="col-xs-12 containerGrids hvr-buzz-out">
						
						<div class="col-xs-12 pics text-center">
							<a href="http:\\google.com"><img src="images/popularDestinations/imageAndaman.jpg" alt="popularDestination1" class="picDim text-center"/></a>
						</div>
						
						<div class="col-xs-12 heading">
							Andaman and Nicobar
						</div>
						
					</div>
					
					<div class="col-xs-12 containerGrids hvr-buzz-out">
						
						<div class="col-xs-12 pics text-center">
							<img src="images/popularDestinations/imageJaisalmer.jpg" alt="popularDestination1" class="picDim text-center"/>
						</div>
						
						<div class="col-xs-12 heading">
							Rajasthan
						</div>
						
					</div>
					
					<div class="col-xs-12 containerGrids hvr-buzz-out">
						
						<div class="col-xs-12 pics text-center">
							<img src="images/popularDestinations/imageKashmir.jpg" alt="popularDestination1" class="picDim text-center"/>
						</div>
						
						<div class="col-xs-12 heading">
							Jammu and Kashmir
						</div>
						
					</div>
				</div>

				-->
				
			</div>
		</div> 
		






		<div class="col-xs-12 popularDestinationsContainer">
		<header class="heading">
    <h1>5+ Year experience. We have,</h1>
  </header>
  <main class="counter-container">
    <div class="social">
      <div class="social-icon">
        <i class="fa fa-thumbs-up"></i>
      </div>
      <p>Happy Travelers</p>
      <h3 class="counter" data-count="5120">0</h3>
    </div>
    <div class="social">
      <div class="social-icon">
        <i class="fa fa-user"></i>
      </div>
      <p>Registered Members</p>
      <h3 class="counter" data-count="500">0</h3>
    </div>
    <div class="social">
      <div class="social-icon">
        <i class="fa fa-heart"></i>
      </div>
      <p>Likes</p>
      <h3 class="counter" data-count="4925">0</h3>
    </div>
    <div class="social">
      <div class="social-icon">
        <i class="fa fa-star" style="background: orange;"></i>
      </div>
      <p>Ratings</p>
      <h3 class="counter" data-count="5">0</h3>
    </div>
  </main>

  <script>
    // select the element
    const counters = document.querySelectorAll('.counter');

    // iterate through all the counter elements
    counters.forEach(counter => {
      // function to increment the counter
      function updateCount() {
        const target = +counter.getAttribute('data-count');
        const count = +counter.innerHTML;


        const inc = Math.floor((target - count) / 100);

        if (count < target && inc > 0) {
          counter.innerHTML = (count + inc);
          // repeat the function
          setTimeout(updateCount, 1);
        }
        // if the count not equal to target, then add remaining count
        else {
          counter.innerHTML = target;
        }
      }
      updateCount();
    });
  </script>     
		</div>
			






		<!-- home -->
		
		<!-- FOOTER SECTION STARTS -->
					
				<div class="footerMod col-sm-12">
					
					<div class="col-sm-4">
						
						<div class="footerHeading">
							Contact Us
						</div>
							
						<div class="footerText">
							Dream Tours and Travels Agency <br>Kuntikan, Mangalore
						</div>
				
						<div class="footerText">
							Email:   <a href="dreamstoursandtravels@gmail.com">dreamtoursandtravels@gmail.com</a> 
						</div>
						
					</div>
					
					<div class="col-sm-4">	
					</div>
					
					<div class="col-sm-4">
					
						<div class="footerHeading">
							Social Links
						</div>
						
						<div class="socialLinks">
						
							<div class="fb">
								facebook.com/tourism_management
							</div>
						
							<div class="gp">
								plus.google.com/tourism_management
							</div>
						
							<div class="tw">
								twitter.com/tourism_management
							</div>
						
							<div class="in">
								linkedin.com/tourism_management
							</div>
						
						</div> <!-- social links -->
						
					</div>
						
					<div class="col-sm-12">
					<div class="copyrightContainer">
						<div class="copyright">
						Copyright &copy; <a href="https://www.instagram.com/deepak_acharya.k/" target="blank">deepak_acharya.k</a>
						</div>
					</div>
					</div>
							
				</div> <!-- footer -->
				
			<!-- FOOTER SECTION ENDS -->
		
	</body>
	
</html>