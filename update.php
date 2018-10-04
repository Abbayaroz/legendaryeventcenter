<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
			  require_once('confiq.php'); 
			  
			  
			 
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
       <?php
       if(isset($_GET['id']))
			  {
			  $id=$_GET['id'];
			  $sql=mysql_query("SELECT r.serial as id, Concat(fname, '  ', lname) as name, e_day, e_month, e_year, start_time, close_time, e_type, h.name as h_name, d.name as d_name, d_color, total_amount, pno, payment_status FROM h_reservation r, customer c, hall h, deco d WHERE c.serial=r.customerid AND h.serial=r.hall_type AND r.serial='$id'") or die(mysql_error());
			  $row_id=mysql_num_rows($sql);
			  $row=mysql_fetch_assoc($sql);
			  
		 echo 
          '<table width="629" border="0">
            <tr>
              <td colspan="2"><font size="+1" ><strong>Reservation Details</strong></font></td>
            </tr>
            <tr>
              <td><strong>Reservation Number:</strong>&nbsp;&nbsp;&nbsp;'.$row['id'].'</td>
			  <td></td>
            </tr>
			<tr>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
            <tr>
              <td><strong>Name:</strong><br />'.$row['name'].'</td>
			  <td></td>
            </tr>
			<tr>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
            <tr>
              <td><strong>Event Type:</strong><br />'.$row['e_type'].'</td>
			  <td><a href="update_details.php?e_type='.$row['id'].'">UPDATE</a></td>
            </tr>
			<tr>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
            <tr>
              <td><strong>Event Date:</strong><br />'.$row['e_day'].'/'.$row['e_month'].'/'.$row['e_year'].'</td>
			  <td><a href="update_details.php?id='.$row['id'].'">UPDATE</a></td>
            </tr>
			<tr>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
            <tr>
              <td><strong>Start Time:</strong><br />'.$row['start_time'].'</td>
			  <td></td>
            </tr>
			<tr>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
            <tr>
              <td><strong>Close Time:</strong><br />'.$row['close_time'].'</td>
			  <td><a href="update_details.php?time='.$row['id'].'">UPDATE</a></td>
            </tr>
			<tr>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
            <tr>
              <td><strong>Payment Status:</strong><br />'.$row['payment_status'].'</td>
			  <td><a href="update_details.php?payment='.$row['id'].'">UPDATE</a></td>
            </tr>
			<tr>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
			<tr>
              <td><strong>Hall:</strong><br />'.$row['h_name'].'</td>
			  <td><a href="update_details.php?hall='.$row['id'].'">UPDATE</a></td>
            </tr>
			<tr>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
			<tr>
              <td><strong>Decoration:</strong><br />'.$row['d_name'].'</td>
			  <td><a href="update_details.php?deco='.$row['id'].'">UPDATE</a></td>
            </tr>
			<tr>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
			<tr>
              <td colspan="2">&nbsp;</td>
            </tr>
			<tr>
              <td colspan="2"><a href="update_details.php?cancel='.$row['id'].'">Cancel Reservation</a></td>
            </tr>
            </table>';
			}	
	   ?> 	 
  	      </p>
		  	 
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