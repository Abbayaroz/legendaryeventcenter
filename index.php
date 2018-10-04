<?php 
if(isset($_POST['signin']))
{
	include 'admin_login.php';
	}
?>
<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Legendary Event centre:: Home</title>
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
						<li><a href="contact.php" class="scroll">Contact  </a></li>
						<li><a href="#" class="scroll">Privacy</a></li>
						<li><a href="#" class="scroll">Terms</a></li>						
					</ul>
				</div>
				<div class="header-grid-right">
					<a href="#" class="sign-in">Sign In</a>
					<form method="post" action="">
						<input type="text" value="" placeholder="Username" name="uname" required>
						<input type="password" value="" placeholder="Password" name="pword" required>
						<input type="submit" name="signin" value="Go">
					</form>
					<label>|</label>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="container">
		<div class="header-bottom">			
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=" " ></a>
				</div>
					<div class="ad-right">
					
				</div>
				<div class="clearfix"> </div>
			</div>	
			<div class="header-bottom-bottom">
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
						<li class="active"><a href="index.php">HOME </a></li>
						<li><a href="about.php" >ABOUT US</a></li>
						<li><a href="gallery.php" >GALLERY</a></li>
						<li><a href="login.php" >RESERVATION</a></li>
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
					<form>
						<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="">
					</form>
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
				<div class="banner">
					<div class="banner-matter">
						<h2>All Day Events Centre</h2>
						</div>		
						<p  class="para-in">Home of events.</p>
				</div>
				<!---->
				<div class="in-line">
					<div class="para-an">
						<h3>Our Halls</h3>
						<p>Check our centre for state of art halls.</p>
					</div>
					<div class="lady-in">
						<div class="col-md-4 you-para">
							<a href="single.html"><img class="img-responsive pic-in" src="images/pi.jpg" alt=" " ></a>
							<p>Marquee Hall</p>
							<span>NGN1,000,000.00  | <a href="login.php">Reserve </a></span>
						</div>
						<div class="col-md-4 you-para">
							<a href="single.html"><img class="img-responsive pic-in" src="images/pi2.jpg" alt=" " ></a>
							<p>Gold Hall</p>
							<span>NGN750,000.00  | <label class="cat-in"> </label> <a href="login">Reserve </a></span>
						</div>
						<div class="col-md-4 you-para para-grid">
							<a href="single.html"><img class="img-responsive pic-in" src="images/pi3.jpg" alt=" " ></a>
							<p>Silver Hall</p>
							<span>NGN500,000.00  | <label class="cat-in"> </label> <a href="login.php">Reserve </a></span>
						</div>
						
						<div class="col-md-4 you-para">
							<a href="single.html"><img class="img-responsive pic-in" src="images/pi4.jpg" alt=" " ></a>
							<p>Marquee</p>
							<span>NGN1,000,000.0  | 
							<label class="cat-in"> </label> <a href="login.php">Reserve </a></span>
						</div>
						<div class="col-md-4 you-para">
							<a href="single.html"><img class="img-responsive pic-in" src="images/pi5.jpg" alt=" " ></a>
							<p>Silver Hall</p>
							<span>NGN500,000.00  | <label class="cat-in"> </label> <a href="login.php">Reserve</a></span>
						</div>
						<div class="col-md-4 you-para para-grid">
							<a href="single.html"><img class="img-responsive pic-in" src="images/pi6.jpg" alt=" " ></a>
							<p>Gold hall</p>
							<span>NGN750,000.00  | <label class="cat-in"> </label> <a href="login.php">Reserve</a></span>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-m-left">
				<div class="in-left">				
					<p class="code">Cool Halls</p>		
					<div class="cool">		
					</div>		
				</div>
				<div class="discount">
					<a href="single.html"><img class="img-responsive pic-in" src="images/p2.jpg" alt=" " >	</a>							
					<a href="login.php" class="know-more">Reserve</a>
				</div>
				<div class="discount">
					<a href="single.html"><img class="img-responsive pic-in" src="images/p3.jpg" alt=" " ></a>			
					<a href="login.php" class="know-more">Reserve</a>
				</div>
				<div class="twitter-in">
					<h5>Legendary Event Centre
				  </h5><div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>
			<!---->
			<div class="lady-in-on">
			<div class="buy-an">
						<h3>Decorations</h3>
						<p>Check out all decorations in this section.</p>
					</div>
					<ul id="flexiselDemo1">			
				<li><a href="#"><img class="img-responsive women" src="images/pic1.jpg" alt=""></a>
				<div class="hide-in">
				<p>Classic</p>
				<span>NGN300,000.00  |  <a href="login.php">Reserve Now </a></span>
				</div></li>
				<li><a href="#"><img class="img-responsive women" src="images/pic2.jpg" alt=""></a>
				<div class="hide-in">
				<p>Elegant</p>
				<span>NGN250,000.00  |  <a href="login.php">Reserve Now </a></span>
				</div></li>
				<li><a href="#"><img class="img-responsive women" src="images/pic3.jpg" alt=""></a>
				<div class="hide-in">
				<p>Normal</p>
				<span>NGN150,000.00  |  <a href="login.php">Reserve Now </a></span>
				</div></li>
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
					<a href="index.html"><img src="images/logo.png" alt=" " /></a>
				</div> 
				<div class="clearfix"> </div>
			 	</div>
		 </div>
	</div>
</body>
</html>