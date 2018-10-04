<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php require_once('confiq.php') ?>
<!DOCTYPE html>
<html>
<title>The Legendary Event Centre : Report</title>
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
					<a href="index.html"><img src="images/logo.png" alt=" " ></a>
				</div>
					<div class="ad-right">
					
				</div>
				<div class="clearfix"> </div>
			</div>	
			<div class="header-bottom-bottom">
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
                    	<li><a href="report.php?weekly=weekly" >WEEKLY REPORT</a></li>
						<li ><a href="report.php?monthly=monthly">MONTHLY REPORT</a></li>
                        <li><a href="report.php?yearly=yearly" >YEARLY REPORT</a></li>
                        <li><a href="admin.php" >DASHBOARD</a></li>
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
					<h5 align="center">Welcome:<?php echo '&nbsp;'.$_SESSION['name']?>&nbsp;|&nbsp;<a href="admin.php">Log Out</a></h5>
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
				if(isset($_GET['day']))
				{
					echo
					'<form method="post">
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
						$sql_day=mysql_query("SELECT r.serial as id, fname, lname, e_day, e_month, e_year, start_time, close_time, e_type, h.name as h_name, d.name as d_name, d_color, total_amount, pno, payment_status FROM h_reservation r, customer c, hall h, deco d WHERE c.serial=r.customerid AND h.serial=r.hall_type AND r.deco_type=d.serial AND e_day='$day' AND e_month='$month' AND e_year='$year' AND h_name='$type'") or die(mysql_error());
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
							<th align="center">Amount Paid</th>
							<th align="center">Balance</th>
							<th align="center">Total Payment</th>
							</tr>';
							do{
							echo
							'<tr>
							<td>'.$r_day['fname'].'&nbsp;'.$r_day['lname'].'</td>
							<td>'.$r_day['pno'].'</td>
							<td>'.$r_day['e_day'].'/'.$r_day['e_month'].'/'.$r_day['e_year'].'</td>  
							<td>'.$r_day['e_time'].'</td>
							<td>'.$r_day['e_type'].'</td>
							<td>'.$r_day['h_type'].'</td>
							<td>'.$r_day['d_color'].'</td>
							<td>NGN'.$r_day['a_paid'].'</td>
							<td>NGN'.$r_day['balance'].'</td>
							<td>NGN'.$r_day['total_payment'].'</td>
							<td><a href="update.php?id='.$r_day['id'].'">EDIT</a></td>';  
							}while($r_day=mysql_fetch_assoc($sql_day));
							echo '</table>';
				  }}
				  if(isset($_GET['monthly']))
				  {
					echo
					'<form method="post">
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
					</form><br /><br />';
					}
					if(isset($_POST['search_month']))
					{
						$month=$_POST['e_month'];
						$year=$_POST['e_year'];
						$sql_month=mysql_query("SELECT h.name as h_name,  count(hall_type) as no_of_events, sum(price) as total FROM h_reservation r, hall h WHERE r.hall_type=h.serial AND e_year='$year' AND e_month='$month' GROUP BY hall_type") or die(mysql_error());
						$deco=mysql_query("SELECT d.name as d_name, count(deco_type) as no_of_deco, sum(price) as t_price FROM deco d, h_reservation r WHERE r.deco_type=d.serial AND e_year='$year' AND e_month='$month' GROUP BY deco_type") or die(mysql_error());
			            $r_month=mysql_fetch_assoc($sql_month);
						$deco_type=mysql_fetch_assoc($deco);
						$row_month=mysql_num_rows($sql_month);
						if($row_month==0)
						{
							echo "Reservation not found. Confirm date before re-trying.";
							}
						else{
						$sql_month_total=mysql_query("SELECT sum(total_amount) as t_income FROM h_reservation WHERE e_year='$year' AND e_month='$month' ") or die(mysql_error());
						$total=mysql_fetch_assoc($sql_month_total);
						 echo
							'<table width="50%" border="1">
								  <tr>
									<td colspan="3" align="center" bgcolor="#FFFFFF"><h3>Reservation Report </h3></td>
								  </tr>
								  <tr bgcolor="#FFFFFF">
								    <th width="26%"><div align="center">Item </div></th>
								    <th width="32%"><div align="center">Number of Events</div></th>
								    <th width="42%"><div align="center">Unit Income</div></th>
		     					  </tr>
								  <tr>
									<td colspan="3"  bgcolor="#FFFFFF"><strong>Halls</strong></td>
								  </tr>';
								  do
								  {
								 echo
								 '<tr>
									<td>'.$r_month['h_name'].'</td>
									<td>'.$r_month['no_of_events'].'</td>
									<td>'.$r_month['total'].'</td>
								  </tr>';
								  }
								  while($r_month=mysql_fetch_assoc($sql_month));
								   echo
								  '<tr>
									<td colspan="3"bgcolor="#FFFFFF"><strong>Decoration</strong></td>
								  </tr>';
								  do
								  {
								 echo
								 '<tr>
									<td>'.$deco_type['d_name'].'</td>
									<td>'.$deco_type['no_of_deco'].'</td>
									<td>'.$deco_type['t_price'].'</td>
								  </tr>';
								  } while($deco_type=mysql_fetch_assoc($deco));
								  echo
								  '<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								  </tr>
								  <tr bgcolor="#003366">
									<td>&nbsp;</td>
									<td><div align="right"><strong><font color="#FFFFFF">Total Income</font></strong></div></td>
									<td><strong><font color="#FFFFFF">NGN'.$total['t_income'].'</font></strong></td>
								  </tr>
								  <tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								  </tr>
						  </table>';
				  }}
					if(isset($_GET['yearly'])) 	
				  {
					echo
					'<form method="post">
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
						$sql_month=mysql_query("SELECT h.name as h_name,  count(hall_type) as no_of_events, sum(price) as total FROM h_reservation r, hall h WHERE r.hall_type=h.serial AND e_year='$year' GROUP BY hall_type") or die(mysql_error());
						
						$deco=mysql_query("SELECT d.name as d_name, count(deco_type) as no_of_deco, sum(price) as t_price FROM deco d, h_reservation r WHERE r.deco_type=d.serial AND e_year='$year' GROUP BY deco_type") or die(mysql_error());
			            $r_month=mysql_fetch_assoc($sql_month);
						$deco_type=mysql_fetch_assoc($deco);
						$row_month=mysql_num_rows($sql_month);
						if($row_month==0)
						{
							echo "Reservation not found. Confirm date before re-trying.";
							}
						else{
						$sql_month_total=mysql_query("SELECT sum(total_amount) as t_income FROM h_reservation WHERE e_year='$year' ") or die(mysql_error());
						$total=mysql_fetch_assoc($sql_month_total);
						 echo
							'<table width="50%" border="1">
								  <tr>
									<td colspan="3" align="center" bgcolor="#FFFFFF"><h3>'.$year.'&nbsp;Reservation Report</h3></td>
								  </tr>
								  <tr bgcolor="#FFFFFF">
								    <th width="26%"><div align="center">Item </div></th>
								    <th width="32%"><div align="center">Number of Events</div></th>
								    <th width="42%"><div align="center">Unit Income</div></th>
		     					  </tr>
								  <tr>
									<td colspan="3"  bgcolor="#FFFFFF"><strong>Halls</strong></td>
								  </tr>';
								  do
								  {
								 echo
								 '<tr>
									<td>'.$r_month['h_name'].'</td>
									<td>'.$r_month['no_of_events'].'</td>
									<td>'.$r_month['total'].'</td>
								  </tr>';
								  }
								  while($r_month=mysql_fetch_assoc($sql_month));
								   echo
								  '<tr>
									<td colspan="3"bgcolor="#FFFFFF"><strong>Decoration</strong></td>
								  </tr>';
								  do
								  {
								 echo
								 '<tr>
									<td>'.$deco_type['d_name'].'</td>
									<td>'.$deco_type['no_of_deco'].'</td>
									<td>'.$deco_type['t_price'].'</td>
								  </tr>';
								  } while($deco_type=mysql_fetch_assoc($deco));
								  echo
								  '<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								  </tr>
								  <tr bgcolor="#003366">
									<td>&nbsp;</td>
									<td><div align="right"><strong><font color="#FFFFFF">Total Income</font></strong></div></td>
									<td><strong><font color="#FFFFFF">NGN'.$total['t_income'].'</font></strong></td>
								  </tr>
								  <tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								  </tr>
						  </table>';
				  }}
				?>
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