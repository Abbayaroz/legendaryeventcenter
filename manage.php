<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
			  require_once('confiq.php'); 
			  $name_error="";
			  $price_error="";
			  $error=0;
			  $msg="";
			  if(isset($_POST['add']))
			  {
			  $name=mysql_real_escape_string($_POST['name']);
			  $price=mysql_real_escape_string($_POST['price']);
			  if(empty($name))
			  {
				$name_error="Please enter name";
				$error=1;
			  }
			  if(empty($price))
			  {
				  $price_error="Please enter price";
				  $error=1;
				  }
				 if($error==0)
				 {
			  $sql=mysql_query("SELECT name from hall where name='$name'") or die(mysql_error());
			  $row_id=mysql_num_rows($sql);
			  if($row_id==1)
			  {
				  $msg= "Cannot add, Similar record exist.";
				  }
			  elseif($row_id==0)
			  {
			    $add=mysql_query("Insert into hall (name, price) values('$name','$price')") or die(mysql_error);
				$msg="Record added successfully";
				  }
				  }
			  }
			  
			  $deconame_error="";
			  $decoprice_error="";
			  $error=0;
			  if(isset($_POST['add_deco']))
			  {
			  $name=mysql_real_escape_string($_POST['name']);
			  $price=mysql_real_escape_string($_POST['price']);
			  if(empty($name))
			  {
				$deconame_error="Please enter name";
				$error=1;
			  }
			  if(empty($price))
			  {
				  $decoprice_error="Please enter price";
				  $error=1;
				  }
				 if($error==0)
				 {
			  $sql=mysql_query("SELECT name from deco where name='$name'") or die(mysql_error());
			  $row_id=mysql_num_rows($sql);
			  if($row_id==1)
			  {
				  $msg= "Cannot add, Similar record exist.";
				  }
			  elseif($row_id==0)
			  {
			    $add=mysql_query("Insert into deco (name, price) values('$name','$price')") or die(mysql_error);
				$msg="Record added successfully";
				  }
				  }
			  }
?>
<!DOCTYPE html>
<html>
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
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<!--//fonts-->
</head>
<body> 
	  <!--header-->
		<div class="header">
		<div class="header-top">
			<div class="container">
				<div class="header-grid">
					<ul>
						<li><a href="#" class="scroll"></a></li>
						<li><a href="#" class="scroll"></a></li>
						<li><a href="#" class="scroll"></a></li>
						<li><a href="#" class="scroll"></a></li>						
					</ul>
				</div>
				<div class="header-grid-right">
					&nbsp;
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
                    	<li ><a href="search.php">Search Reservation</a></li>
                        <li><a href="manage.php?hall=hall" >Manage Halls</a></li>
                        <li><a href="manage.php?deco=deco" >Manage Decoration</a></li>
                        <li><a href="report.php" >Report</a></li>
						<li><a href="admin.php" >Dashboard</a></li>
					</ul>		
					<div class="clearfix"> </div>	
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
				</script>					
				</div>
				<div class="search">
					<h5 align="center">Welcome:<?php echo '&nbsp;'.$_SESSION['name']?>&nbsp;|&nbsp;<a href="admin.php?logout=logout">Log Out</a></h5>
				</div>
				<div class="clearfix"> </div>
				</div>
		</div>
	</div>
	<!---->
	<div class="content">
		<div class="container"> 			         
		<div class="register">
       
		  	  <p>
              
		  	  <?php
			  if(isset($_GET['hall']))
			  {
			  echo
              '<form method="post"> 
				 <div class="  register-top-grid">
					<h3>ADD NEW HALL.</h3>
					<div class="mation">
						<span>Hall Name<label>*</label></span>
						<input type="text" name="name" id="name"><br />
						'.$name_error.'
						<span>Price<label>*</label></span>
						<input type="text" name="price" id="price" ><br />
						'.$price_error.' 
					</div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						<input type="submit" name="add" value="ADD">
					   </a>
					 </div>  
				</form>';
			  }
			  	if(isset($_POST['add'])){ echo $msg;}			
				?>
              <?php
			  if(isset($_GET['deco']))
			  {
			  echo
              '<form method="post"> 
				 <div class="  register-top-grid">
					<h3>ADD DECORATION.</h3>
					<div class="mation">
						<span>Hall Name<label>*</label></span>
						<input type="text" name="name" id="name"><br />
						'.$deconame_error.'
						<span>Price<label>*</label></span>
						<input type="text" name="price" id="price" ><br />
						'.$decoprice_error.' 
					</div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						<input type="submit" name="add_deco" value="ADD">
					   </a>
					 </div>  
				</form>';
			  }
			  	if(isset($_POST['add_deco'])){ echo $msg;}			
				?>
  	      </p>
		  	  <p>&nbsp;</p>
		  	  <p>&nbsp;</p>
		  	  <p>&nbsp;</p>
		  	  <p>&nbsp;</p>
		  	  <p>&nbsp;</p>
		  	  <p>&nbsp;</p>
		  	  <p>&nbsp;</p>
		  	  <p>&nbsp;</p>
		  	  <p>&nbsp;</p>
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
				<div class="clearfix"> </div>
			 	</div>
		 </div>
	</div>
</body>
</html>