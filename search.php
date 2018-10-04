<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php require_once('confiq.php') ?>
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
						<li ><a href="search.php?id=id">Search by invoice no.</a></li>
						<li><a href="search.php?day=day" >Search by day</a></li>
                        <li><a href="search.php?month=month" >Search by month</a></li>
						<li><a href="search.php?year=year" >Search by year</a></li>
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
			  if(isset($_GET['id']))
			  {
			  echo
              '<form method="post"> 
				 <div class="  register-top-grid">
					<h3>SEARCH RESERVATION BY INVOICE NO.</h3>
					<div class="mation">
						<span>Invoice Number<label>*</label></span>
						<input type="text" name="no" id="no"> 
					
					</div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						<input type="submit" name="id" value="Search">
					   </a>
					 </div>  
				</form>';
			  }
			  if(isset($_POST['id']))
			  {
			  $no=$_POST['no'];
			  $sql=mysql_query("SELECT r.serial as id, fname, lname, e_day, e_month, e_year, start_time, close_time, e_type, hall_type, deco_type, d_color, total_amount, payment_status, pno, h.name as h_name, d.name as d_name FROM h_reservation r, customer c, hall h, deco d WHERE r.customerid=c.serial AND d.serial=hall_type AND h.serial=deco_type AND r.serial='$no'");
			  $record=mysql_fetch_assoc($sql);
			  $row_id=mysql_num_rows($sql);
			  if($row_id==0)
			  {
				  echo "No reservation with similar no is found. Confirm before re-trying.";
				  }
			  else{
			  echo
			  '<table width="100%" border="4" align="center" bordercolor="#CC0000">
				<tr>
				  <td align="center" colspan="10"><h3>Reservation Details</h3></td>
				</tr>
				<tr>
				<th align="center">Customer Name</th>
				<th align="center">Phone No.</th>
				<th align="center">Date</th>
				<th align="center">Time</th>
				<th align="center">Type</th>
				<th align="center">Hall</th>
				<th align="center">Decoration</th>
				<th align="center">Deco color</th>
				<th align="center">Amount Paid</th>
				<th align="center">Payment Status</th>
				</tr>
				<tr>
				<td>'.$record['fname'].'&nbsp;'.$record['lname'].'</td>
				<td>'.$record['pno'].'</td>
				<td>'.$record['e_day'].'/'.$record['e_month'].'/'.$record['e_year'].'</td>  
				<td>'.$record['start_time'].'&nbsp;to&nbsp;'.$record['close_time'].'</td>
				<td>'.$record['e_type'].'</td>
				<td>'.$record['h_name'].'</td>
				<td>'.$record['d_name'].'</td>
				<td>'.$record['d_color'].'</td>
				<td>NGN'.$record['total_amount'].'</td>
				<td>'.$record['payment_status'].'</td>
				<td><a href="update.php?id='.$record['id'].'">EDIT</a></td>
			    </table>';  
				  }}
				if(isset($_GET['day']))
				{
					echo
					'<form method="post">
					<span>Venue Type<label>*</label></span>
					<select name="h_type">
						  <option value="">Select</option>
						  <option value="Marquee">Marquee</option>
						  <option value="Gold">Gold</option>
						  <option value="Silver">Silver</option>
					</select><br />
					<span>Event Date<label>*</label></span>
						<select name="e_day">
						  <option>Day</option>
						  <option value="01">01</option>
						  <option value="02">02</option>
						  <option value="03">03</option>
						  <option value="04">04</option>
						  <option value="05">05</option>
						  <option value="06">06</option>
						  <option value="07">07</option>
						  <option value="08">08</option>
						  <option value="09">09</option>
						  <option value="10">10</option>
						  <option value="11">11</option>
						  <option value="12">12</option>
						  <option value="13">13</option>
						  <option value="14">14</option>
						  <option value="15">15</option>
						  <option value="16">16</option>
						  <option value="17">17</option>
						  <option value="18">18</option>
						  <option value="19">19</option>
						  <option value="20">20</option>
						  <option value="21">21</option>
						  <option value="22">22</option>
						  <option value="23">23</option>
						  <option value="24">24</option>
						  <option value="25">25</option>
						  <option value="26">26</option>
						  <option value="27">27</option>
						  <option value="28">28</option>
						  <option value="29">29</option>
						  <option value="30">30</option>
						  <option value="31">31</option>
						  </select>
						<select name="e_month">
						  <option>Month</option>
						  <option value="01">January</option>
						  <option value="02">February</option>
						  <option value="03">March</option>
						  <option value="04">April</option>
						  <option value="05">May</option>
						  <option value="06">June</option>
						  <option value="07">July</option>
						  <option value="08">August</option>
						  <option value="09">September</option>
						  <option value="10">October</option>
						  <option value="11">November</option>
						  <option value="12">December</option>
						  </select>
						<select name="e_year">
						  <option>Year</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option>
						  <option value="2017">2017</option>
						  <option value="2018">2018</option>
						  <option value="2019">2019</option>
						  <option value="2030">2030</option>
						  </select>
						  <input type="submit" name="search_day" value="Search">
					</form><br /><br />';
					}
					if(isset($_POST['search_day']))
					{
						$day=$_POST['e_day'];
						$month=$_POST['e_month'];
						$year=$_POST['e_year'];
						$type=$_POST['h_type'];
						$sql_day=mysql_query("SELECT r.serial as id, fname, lname, e_day, e_month, e_year, start_time, close_time, e_type, d.name as h_name, d.name as d_name, d_color, total_amount,  pno, payment_status FROM h_reservation r, customer c, hall h, deco d WHERE r.hall_type=h.serial AND r.deco_type=d.serial AND c.serial=r.customerid AND e_day='$day' AND e_month='$month' AND e_year='$year' AND h.name='$type'") or die(mysql_error()) or die(mysql_error());
			            $r_day=mysql_fetch_assoc($sql_day);
						$row_day=mysql_num_rows($sql_day);
						if($row_day==0)
						{
							echo "Reservation not found. Confirm date before re-trying.";
							}
						else
						{
						 echo
							'<table width="100%" border="4" align="center" bordercolor="#CC0000">
							<tr>
							  <td align="center" colspan="9"><h3>Reservation Details</h3></td>
							</tr>
							<tr>
							<th align="center">Customer Name</th>
							<th align="center">Phone No.</th>
							<th align="center">Date</th>
							<th align="center">Time</th>
							<th align="center">Type</th>
							<th align="center">Hall</th>
							<th align="center">Decoration</th>
							<th align="center">Deco color</th>
							<th align="center">Amount Paid</th>
							<th align="center">Payment Status</th>
							</tr>';
							do{
							echo
							'<tr>
							<td>'.$r_day['fname'].'&nbsp;'.$r_day['lname'].'</td>
							<td>'.$r_day['pno'].'</td>
							<td>'.$r_day['e_day'].'/'.$r_day['e_month'].'/'.$r_day['e_year'].'</td>  
							<td>'.$r_day['start_time'].'&nbsp;to&nbsp;'.$r_day['close_time'].'</td>
							<td>'.$r_day['e_type'].'</td>
							<td>'.$r_day['h_name'].'</td>
							<td>'.$r_day['d_name'].'</td>
							<td>'.$r_day['d_color'].'</td>
							<td>NGN'.$r_day['total_amount'].'</td>
							<td>'.$r_day['payment_status'].'</td>
							<td><a href="update.php?id='.$r_day['id'].'">EDIT</a></td>';  
							}while($r_day=mysql_fetch_assoc($sql_day));
							echo '</table>';
				  }}
				  if(isset($_GET['month']))
				  {
					echo
					'<form method="post">
					<span>Venue Type<label>*</label></span>
					<select name="h_type">
						  <option value="">Select</option>
						  <option value="Marquee">Marquee</option>
						  <option value="Gold">Gold</option>
						  <option value="Silver">Silver</option>
					</select>
					<br />
					<span>Event Date<label>*</label></span>
						<select name="e_month">
						  <option>Month</option>
						  <option value="01">January</option>
						  <option value="02">February</option>
						  <option value="03">March</option>
						  <option value="04">April</option>
						  <option value="05">May</option>
						  <option value="06">June</option>
						  <option value="07">July</option>
						  <option value="08">August</option>
						  <option value="09">September</option>
						  <option value="10">October</option>
						  <option value="11">November</option>
						  <option value="12">December</option>
						  </select>
						<select name="e_year">
						  <option>Year</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option>
						  <option value="2017">2017</option>
						  <option value="2018">2018</option>
						  <option value="2019">2019</option>
						  <option value="2030">2030</option>
						  </select>
						  <input type="submit" name="search_month" value="Search">
					</fomr><br /><br />';
					}
					if(isset($_POST['search_month']))
					{
						$month=$_POST['e_month'];
						$year=$_POST['e_year'];
						$type=$_POST['h_type'];
						$sql_month=mysql_query("SELECT r.serial as id, fname, lname, e_day, e_month, e_year, start_time, close_time, e_type, h.name as h_name, d.name as d_name, d_color,  pno, total_amount, payment_status FROM h_reservation r, customer c, hall h, deco d WHERE d.serial=r.deco_type AND h.serial=r.hall_type AND c.serial=r.customerid AND e_month='$month' AND e_year='$year' AND h.name='$type'") or die(mysql_error());
			            $r_day=mysql_fetch_assoc($sql_month);
						$row_month=mysql_num_rows($sql_month);
						if($row_month==0)
						{
							echo "Reservation not found. Confirm date before re-trying.";
							}
						else{
						 echo
							'<table width="100%" border="4" align="center" bordercolor="#CC0000">
							<tr>
							  <td align="center" colspan="9"><h3>Reservation Details</h3></td>
							</tr>
							<tr>
							<th align="center">Customer Name</th>
							<th align="center">Phone No.</th>
							<th align="center">Date</th>
							<th align="center">Time</th>
							<th align="center">Type</th>
							<th align="center">Hall</th>
							<th align="center">Decoration</th>
							<th align="center">Deco Color</th>
							<th align="center">Total Amount</th>
							<th align="center">Payment Status</th>
							</tr>';
							do{
							echo
							'<tr>
							<td>'.$r_day['fname'].'&nbsp;'.$r_day['lname'].'</td>
							<td>'.$r_day['pno'].'</td>
							<td>'.$r_day['e_day'].'/'.$r_day['e_month'].'/'.$r_day['e_year'].'</td>  
							<td>'.$r_day['start_time'].'&nbsp;to&nbsp;'.$r_day['close_time'].'</td>
							<td>'.$r_day['e_type'].'</td>
							<td>'.$r_day['h_name'].'</td>
							<td>'.$r_day['d_name'].'</td>
							<td>'.$r_day['d_color'].'</td>
							<td>NGN'.$r_day['total_amount'].'</td>
							<td>NGN'.$r_day['payment_status'].'</td>
							<td><a href="update.php?id='.$r_day['id'].'">EDIT</a></td>';  
							}while($r_day=mysql_fetch_assoc($sql_month));
							echo '</table>';
				  }}
					if(isset($_GET['year']))
				  {
					echo
					'<form method="post">
					<span>Venue Type<label>*</label></span>
					<select name="h_type">
						  <option value="">Select</option>
						  <option value="Marquee">Marquee</option>
						  <option value="Gold">Gold</option>
						  <option value="Silver">Silver</option>
					</select>
					<br />
					<span>Event Date<label>*</label></span>
						  <select name="e_year">
						  <option>Year</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option>
						  <option value="2017">2017</option>
						  <option value="2018">2018</option>
						  <option value="2019">2019</option>
						  <option value="2030">2030</option>
						  </select>
						  <input type="submit" name="search_year" value="Search">
					</fomr><br /><br />';
					}
					if(isset($_POST['search_year']))
					{
						$year=$_POST['e_year'];
						$type=$_POST['h_type'];
						$sql_year=mysql_query("SELECT r.serial as id, fname, lname, e_day, e_month, e_year, start_time, close_time, e_type, h.name as h_name, d.name as d_name, d_color, total_amount, pno, payment_status FROM h_reservation r, customer c, hall h, deco d WHERE c.serial=r.customerid AND h.serial=r.hall_type AND d.serial=r.deco_type AND e_year='$year' AND h.name='$type'") or die(mysql_error());
			            $r_day=mysql_fetch_assoc($sql_year);
						$row_year=mysql_num_rows($sql_year);
						if($row_year==0)
						{
							echo "Reservation not found. Confirm date before re-trying.";
							}
						else{
						 echo
							'<table width="100%" border="4" align="center" bordercolor="#CC0000">
							<tr>
							  <td align="center" colspan="9"><h3>Reservation Details</h3></td>
							</tr>
							<tr>
							<th align="center">Customer Name</th>
							<th align="center">Phone No.</th>
							<th align="center">Date</th>
							<th align="center">Time</th>
							<th align="center">Type</th>
							<th align="center">Hall</th>
							<th align="center">Decoration</th>
							<th align="center">Deco color</th>
							<th align="center">Total Amount</th>
							<th align="center">Payment Status</th>';
							do{
							echo
							'<tr>
							<td>'.$r_day['fname'].'&nbsp;'.$r_day['lname'].'</td>
							<td>'.$r_day['pno'].'</td>
							<td>'.$r_day['e_day'].'/'.$r_day['e_month'].'/'.$r_day['e_year'].'</td>  
							<td>'.$r_day['start_time'].'&nbsp;to&nbsp;'.$r_day['close_time'].'</td>
							<td>'.$r_day['e_type'].'</td>
							<td>'.$r_day['h_name'].'</td>
							<td>'.$r_day['d_name'].'</td>
							<td>'.$r_day['d_color'].'</td>
							<td>NGN'.$r_day['total_amount'].'</td>
							<td>'.$r_day['payment_status'].'</td>
							<td><a href="update.php?id='.$r_day['id'].'">EDIT</a></td>';  
							}while($r_day=mysql_fetch_assoc($sql_year));
							echo '</table>';
				  }}
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