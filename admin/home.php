<style>
  *
  {
    color: white;
  }

</style>

<div class="container" >
  
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 

<style>

	
	.iconcontainer img
	{
		padding-top: 5px;
		border-radius: 80px;
		height: 150px;
		width: 150px;
		justify-content: center;
	
	}
	.box1 {
        display: flex;
		text-align: center;
	}
		.box2 {
        display: flex;
		text-align: center;
      }
.one,.two,.three,.four,.five,.six,.seven
{
	height: 270px;
	border-radius: 10px;
}

      .one {
        flex: 1;
		background: #13c2cb73;
      }

      .two {
        flex: 1;
		background: #8e6f11;
		margin-left: 10px;
      }

      .three {
        flex: 1;
		background:#257207;
		margin-left: 10px;
      }
	  .four {
        flex: 1;
		background: #0b4379;
		margin-left: 10px;
      }

      .five {
        flex: 1;
		background: #ff8686;
		margin-top: 10px;
		
      }

      .six {
        flex: 1;
		background: #b546be;
		margin-left: 10px;
		margin-top: 10px;
      }

	  .seven {
        flex: 1;
		background: #a39f12;
		margin-left: 10px;
		margin-top: 10px;
      }

</style>


<body>
   <div class="page-container"  >
   <!--/content-inner-->
     <div class="left-content"  >
	   <div class="mother-grid-inner"  >
          <!--header start here-->
          <?php include('inc/header.php');?>



    <!--four-card here-->
          <div class="box1">
        		<div class="one">
					<div class="iconcontainer">
						<img src="../images/admin_icons/user_icon.webp" alt="">
					</div>
					<br>
					<h4>User</h4>
                	<h1><?php 
                		$conn=mysqli_connect("localhost","root","","projectmeteor");
                		$sql = "SELECT * from users";
               			if($result=mysqli_query($conn,$sql))
               			{
               			$rowcount=mysqli_num_rows($result);
                		printf("%d",$rowcount);
        				}
              		?>
					</h1>
				</div>
				

        		<div class="two">
					<div class="iconcontainer">
						<img src="../images/admin_icons/package_icon.webp" alt="">
					</div>
					<br>
					<h4>Package Bookings</h4>

                	<h1><?php 
                		$conn=mysqli_connect("localhost","root","","projectmeteor");
                		$sql = "SELECT * from book_list";
                		if($result=mysqli_query($conn,$sql))
                		{
                		$rowcount=mysqli_num_rows($result);
                		printf("%d",$rowcount);
                		}
                	?>
					</h1>
				</div>


        		<div class="three">
					<div class="iconcontainer">
						<img src="../images/admin_icons/hotel_icon.jpg" alt="">
					</div>
					<br>
					<h4>Hotel Bookings</h4>
                	<h1> <?php 
                		$conn=mysqli_connect("localhost","root","","projectmeteor");
                		$sql = "SELECT * from hotelbookings WHERE cancelled='no'";
              			if($result=mysqli_query($conn,$sql))
               			{
                		$rowcount=mysqli_num_rows($result);
                		printf("%d",$rowcount);
                		mysqli_close($conn);
               			}
               		?>
					</h1>
				</div>

				<div class="four">
					<div class="iconcontainer">
						<img src="../images/admin_icons/flights_icon.jpg" alt="">
					</div>
					<br>
					<h4>Flight Bookings</h4>
                	<h1>		<?php 
                				$conn=mysqli_connect("localhost","root","","projectmeteor");
                				$sql = "SELECT * from flightbookings WHERE cancelled='no'";
               					if($result=mysqli_query($conn,$sql))
               					{
                				$rowcount=mysqli_num_rows($result);
                				printf("%d",$rowcount);
                				mysqli_close($conn);
               					}
               					?>
								</h1>	
				</div>
      	  </div>





			<div class="box2">
        		<div class="five">
					<div class="iconcontainer">
						<img src="../images/admin_icons/train_icon.webp" alt="">
					</div>
					<br>
					<h4>Train Bookings</h4>
                		<h1>	<?php 
                			$conn=mysqli_connect("localhost","root","","projectmeteor");
                			$sql = "SELECT * from trainbookings WHERE cancelled='no'";
               				if($result=mysqli_query($conn,$sql))
               				{
                			$rowcount=mysqli_num_rows($result);
                			printf("%d",$rowcount);
                			mysqli_close($conn);
               				}
               				?>
							</h1>
				</div>
				

        		<div class="six">
					<div class="iconcontainer">
						<img src="../images/admin_icons/buss_icon.png" alt="">
					</div>
					<br>
					<h4>Bus Bookings</h4>
					<h1>
                			<?php 
                			$conn=mysqli_connect("localhost","root","","projectmeteor");
                			$sql = "SELECT * from busbookings WHERE cancelled='no'";
               				if($result=mysqli_query($conn,$sql))
               				{
                			$rowcount=mysqli_num_rows($result);
                			printf("%d",$rowcount);
                			mysqli_close($conn);
               				}
               				?>
							</h1>
				</div>


        		<div class="seven">
					<div class="iconcontainer">
						<img src="../images/admin_icons/issue_icon.png" alt="" >
					</div>
					<br>
					<h4>Issues Riaised </h4>
					<h1>		<?php 
                				$conn=mysqli_connect("localhost","root","","projectmeteor");
                				$sql = "SELECT * from inquiry";
               					if($result=mysqli_query($conn,$sql))
               					{
                				$rowcount=mysqli_num_rows($result);
                				printf("%d",$rowcount);
                				mysqli_close($conn);
               					}
               					?>
					</h1>	
				</div>
      	  </div>





				<div class="clearfix"></div>
				</div>
    
<!--//four-grids here-->

			<div class="inner-block">

		</div>
<!--inner block end here-->
<!--copy rights start here-->
	</div>
</div>

			<!--/sidebar-menu-->
				
							<div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() 
								{
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
								toggle = !toggle;
								});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
  
		</script>
	</body>
</html>

</div>



