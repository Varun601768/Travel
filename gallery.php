<html>
<head>
<style>
#images-wrapper {    
   line-height: 0;       
    -webkit-column-count: 5;    
    -webkit-column-gap: 0px;    
    -moz-column-count: 5;
    -moz-column-gap: 0px;
     column-count: 5;    
     column-gap: 0px;    
}  
#images-wrapper img {    
   width: 100% !important;    
   height: auto !important;  
}  
#images-wrapper{    
   display:inline-block;    
   margin-right: auto;    
   margin-left: auto;  
}
</style>

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
<body>

    <?php 
		
			if(!isset($_SESSION["username"])) {
				include("common/headerLoggedOut.php");
			}
			else {
				include("common/headerLoggedIn.php");
			}
		
		?>


  <div id="images-wrapper"> 
    <img src="https://img.etimg.com/thumb/width-1200,height-900,imgsize-194472,resizemode-75,msid-89196678/news/india/significant-dip-in-footfall-at-commercial-tourist-places-in-delhi-due-to-pollution-claims-recent-study.jpg"  alt="picture 1" />> 
    <img src="https://thewanderlustrose.com/wp-content/uploads/2019/10/72242049_10157225021768800_1293688220214624256_n.jpg" alt="picture 2" /> 
    <img src="https://www.inhandwriter.com/wp-content/uploads/2020/10/04-Style-29-min-scaled.jpg " alt="picture3"/>
    <img src="https://i.ndtvimg.com/i/2015-12/eva_640x480_51450349871.jpg " alt="picture4"/>
    <img src="https://media.istockphoto.com/id/517094615/photo/women-taking-a-selfie-with-statue-of-liberty-on-background.jpg?s=612x612&w=0&k=20&c=CTxxXO-7rMypc3sMmJx79asrhQcOw5MzK0oSazOMSMg=    " alt="picture5"/>
    <img src="https://media.istockphoto.com/id/1395848214/photo/shot-of-a-young-couple-taking-selfies-in-front-of-big-ben-while-exploring-the-city-of-london.jpg?s=612x612&w=0&k=20&c=3yZXj-i4GCYtkHHOILvGwHZsLMnam1liAWeElTmXjEQ=    " alt="picture6"/>
    <img src="https://qph.cf2.quoracdn.net/main-qimg-d0b81d598be41e5bb32ca5edd4bcaece-lq    " alt="picture7"/>
    <img src="https://i.insider.com/5e1cc33c49878c4baf5842d5?width=1000&format=jpeg&auto=webp    " alt="picture8"/>
    <img src="https://i.insider.com/5da75780045a31533e4fdf05?width=1136&format=jpeg" alt="picture9"/>
    <img src="https://www.thomascook.in/blog/wp-content/uploads/2022/07/Places-to-visit-with-family.jpg    " alt="picture10"/>
    <img src="https://s01.sgp1.cdn.digitaloceanspaces.com/article/77647-dfntuzexit-1514454960.jpg    " alt="picture11"/>
    <img src="https://ihplb.b-cdn.net/wp-content/uploads/2015/10/Jaisalmer-Romance-of-the-Desert-Kingdom.jpg    " alt="picture12">
    <img src="https://media.self.com/photos/5f97059610eea3f4bed318ce/4:3/w_2560%2Cc_limit/5d8bad356bb5c20008ea8014_image2.png    " alt="picture13">
    <img src="https://images.squarespace-cdn.com/content/v1/5a3bb03b4c326d76de73ddaa/1622559786569-F4UVF7274QAKJHWD00UM/The_Common_Wanderer_india_train_travel_tips-17_1.jpg?format=1000w" alt="picture14">
    <img src="https://image.cnbcfm.com/api/v1/image/105505116-1539413294812gettyimages-75256980.jpeg?v=1539413500&w=1920&h=1080" alt="picture16">
    <img src="https://media.istockphoto.com/id/1140611116/photo/excited-to-travel.jpg?s=612x612&w=0&k=20&c=noaDQ4_2H3Z0AuZPiYtoljGRu_IyZyJwo4xiu1xs7C0=" alt="picture15">
    <img src="https://images.hindustantimes.com/img/2022/04/09/1600x900/India-Kashmir-Tourism-1_1649516088292_1649516149207.jpg" alt="picture17">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCLPvxZYhqtuhKARHGIttfxgWUzvDi4K_MSANwnSqY-5IQ0YuqOmSbpCifrKVQEfudJtU&usqp=CAU" alt="picture18">
    <img src="https://thewanderlustrose.com/wp-content/uploads/2019/10/72242049_10157225021768800_1293688220214624256_n.jpg" alt="picture 2" /> 
    <img src="https://www.inhandwriter.com/wp-content/uploads/2020/10/04-Style-29-min-scaled.jpg " alt="picture3"/>
    <img src="https://i.ndtvimg.com/i/2015-12/eva_640x480_51450349871.jpg " alt="picture4"/>
</div>
</body>
</html>