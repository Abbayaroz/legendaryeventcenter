<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
require_once('confiq.php');
if(isset($_GET['logout']))
{
	session_unset();
	header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>The Legendary Event Centre</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashion Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
</head>
<body> 
	  <!--header-->
		<div class="header">
		<div class="header-top">
			<div class="container">
				<div class="header-grid">
					<ul>
												
					</ul>
				</div>
				<div class="header-grid-right">
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="container">
		<div class="header-bottom">			
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=" " ></a>
				</div>
					
				<div class="clearfix"> </div>
			</div>	
			<div class="header-bottom-bottom">
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
                    	<li ><a href="search.php">Search Reservation</a></li>
                        <li><a href="manage.php?hall=hall" >Manage Halls</a></li>
                        <li><a href="manage.php?deco=deco" >Manage Decoration</a></li>
                        <li><a href="report.php" >Report</a></li>
					</ul>		
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
				</script>
					
					<div class="clearfix"> </div>					
				</div>
				<div class="search">
					<h5 align="center">Welcome:<?php echo '&nbsp;'.$_SESSION['name']; ?>&nbsp;|&nbsp;<a href="admin.php?logout=logout">Log Out</a></h5>
				</div>
				<div class="clearfix"> </div>
				</div>
		</div>
	</div>
	<!--content-->
	<div class="content">
		<div class="container">
		<div class="women-in">
			<div class="col-md-9 col-d">
				
			</div>
			<div class="col-md-3 col-m-left"></div>
			<div class="clearfix"> </div>
			</div>
			<!---->
			<div class="lady-in-on">
			  <ul id="flexiselDemo1">			
				<li><a href="#"><img class="img-responsive women" src="images/pic1.jpg" alt=""></a>
				<div class="hide-in">
				</div></li>
				<li><a href="#"><img class="img-responsive women" src="images/pic2.jpg" alt=""></a>
				<div class="hide-in">
				</div></li>
				<li><a href="#"><img class="img-responsive women" src="images/pic3.jpg" alt=""></a>
				<div class="hide-in">
				</div></li>
				<li><a href="#"><img class="img-responsive women" src="images/pic1.jpg" alt=""></a>
				<div class="hide-in">
				</div></a></li>
            </ul>
            		<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 4,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
	</div>
	<!---->
	<div class="footer">
		<div class="container">
				<div class="footer-class">
				<div class="class-footer">
                <ul>
						<li ><a href="index.php" class="scroll">HOME </a><label>|</label></li>
						<li><a href="about.php" class="scroll">ABOUT US</a><label>|</label></li>
						<li><a href="gallery.php" class="scroll">GALLERY</a><label>|</label></li>
						<li><a href="login.php" class="scroll">RESERVATION</a><label>|</label></li>
					</ul>
					 <p class="footer-grid">&copy; 2016 Legendary <a href="#" target="_blank">Event Centre</a> </p>
				</div>	 
				<div class="footer-left">
					<a href="index.php"><img src="images/logo.png" alt=" " /></a>
				</div> 
                </div>	  
				<div class="clearfix"> </div>
			 	</div>
		 </div>
	</div>
</body>
</html>