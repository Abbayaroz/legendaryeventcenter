<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
			  require_once('confiq.php'); 
			  $day_error="";
			  $month_error="";
			  $year_error="";
			  $error=0;
			  
			  if(isset($_POST['update_date']))
			  {
			  $msg="";
			  $day=mysql_real_escape_string($_POST['e_day']);
			  $month=mysql_real_escape_string($_POST['e_month']);
			  $year=mysql_real_escape_string($_POST['e_year']);
			  if(empty($day))
			  {
				$day_error="Please select day";
				$error=1;
			  }
			  if(empty($month))
			  {
				  $month_error="Please select month";
				  $error=1;
				  }
				  if(empty($year))
			  {
				  $year_error="Please select year";
				  $error=1;
				  }
				 if($error==0)
				 {
			  $sql=mysql_query("SELECT r.serial as id, e_day, e_month, e_year, start_time, close_time, e_type, h.name as h_name, d.name as d_name, d_color, payment_status FROM h_reservation r, hall h, deco d WHERE h.serial=r.hall_type AND r.serial=".$_SESSION['id']."") or die(mysql_error());
			  $hall=mysql_fetch_assoc($sql);
			  $h_name=$hall['h_name'];
			  $sql2=mysql_query("SELECT e_day, e_month, e_year, h.name as h_name FROM h_reservation r, hall h WHERE h.serial=r.hall_type AND e_day='$day' AND e_month='$month' AND e_year='$year' AND h.name='$h_name'") or die(mysql_error());
			  
			  $row_id=mysql_num_rows($sql2);
			  if($row_id==1)
			  {
				  $msg= "Venue already reserved for a different event. Change your date";
				  }
			  elseif($row_id==0)
			  {
			    $add=mysql_query("UPDATE h_reservation SET e_day='$day', e_month='$month', e_year='$year' WHERE serial='".$_SESSION['id']."'") or die(mysql_error());
				$msg="Record updated successfully";
				unset($_SESSION['id']);
				  }
				  }
			  }
$msg="";
$etype_error="";
if(isset($_POST['update_etype']))
{
	 $msg="";
	 $etype_error="";
     $e_error=0;
	 $e_type=mysql_real_escape_string($_POST['e_type']);
	 if(empty($e_type))
	 {
		 $etype_error="Select new event type";
		 $e_error=1;
		 }
	if($e_error==0)
	{
		$e_update=mysql_query("UPDATE h_reservation SET  e_type='$e_type' WHERE serial='".$_SESSION['eid']."'") or die(mysql_error());
				$msg="Record updated successfully";
				unset($_SESSION['eid']);
		
		}
	
	}	
$stime_error="";
$ctime_error="";
$t_error=0;	  
if(isset($_POST['update_time']))
{
	$s_time=mysql_real_escape_string($_POST['start_time']);
	$c_time=mysql_real_escape_string($_POST['close_time']);
	$msg="";
	if(empty($s_time))
	{
		$stime_error="Select start time.";
		$t_error=1;
		}
	if(empty($c_time))
	{
		$ctime_error="select closing time.";
		$t_error=1;
		}
	if($c_time<=$s_time)
	{
		$msg="Close time cannot be less than start time.";
		}
	if($t_error==0)
	{
		$sql=mysql_query("SELECT r.serial as id, e_day, e_month, e_year, start_time, close_time, e_type, h.name as h_name, d.name as d_name, d_color, payment_status FROM h_reservation r, hall h, deco d WHERE h.serial=r.hall_type AND r.serial=".$_SESSION['time']."") or die(mysql_error());
			  $hall=mysql_fetch_assoc($sql);
			  $h_name=$hall['h_name'];
			  $e_day=$hall['e_day'];
			  $e_month=$hall['e_month'];
			  $e_year=$hall['e_year'];
			  $sql2=mysql_query("SELECT e_day, e_month, e_year, h.name as h_name FROM h_reservation r, hall h WHERE h.serial=r.hall_type AND e_day='$e_day' AND e_month='$e_month' AND e_year='$e_year' AND h.name='$h_name' AND start_time='$s_time' AND close_time='$c_time'") or die(mysql_error());
			  
			  $row_id=mysql_num_rows($sql2);
			  if($row_id==1)
			  {
				  $msg= "Venue already reserved for a different event. Change your time";
				  }
			  elseif($row_id==0)
			  {
			    $add=mysql_query("UPDATE h_reservation SET start_time='$s_time', close_time='$c_time' WHERE serial='".$_SESSION['time']."'") or die(mysql_error());
				$msg="Time updated successfully";
				unset($_SESSION['time']);
				  }
		}
	}
$payment_error="";
$p_error=0;	
if(isset($_POST['update_payment']))
{
	$payment=mysql_real_escape_string($_POST['payment']);
	$msg="";
	if(empty($payment))
	{
		$payment_error="Please select payment status.";
		$p_error=1;
		}
	if($p_error==0)
	{
		$add=mysql_query("UPDATE h_reservation SET payment_status='$payment' WHERE serial='".$_SESSION['payment']."'") or die(mysql_error());
		$msg="Payment updated successfully";
		unset($_SESSION['payment']);
		}
	}	


if(isset($_POST['update_hall']))
{
	$hall=mysql_real_escape_string($_POST['hall_type']);
	$sql=mysql_query("SELECT r.serial as id, e_day, e_month, e_year, start_time, close_time, e_type,  hall_type, d.name as d_name, d_color, payment_status FROM h_reservation r,  deco d WHERE r.serial=".$_SESSION['hall']."") or die(mysql_error());
			  $hall=mysql_fetch_assoc($sql);
			  $h_name=$hall['hall_type'];
			  $e_day=$hall['e_day'];
			  $e_month=$hall['e_month'];
			  $e_year=$hall['e_year'];
			  $s_time=$hall['start_time'];
			  $c_time=$hall['close_time'];
			  $sql2=mysql_query("SELECT hall_type FROM h_reservation  WHERE e_day='$e_day' AND e_month='$e_month' AND e_year='$e_year' AND hall_type='$h_name' AND start_time='$s_time' AND close_time='$c_time'") or die(mysql_error());
			  
			  $row_id=mysql_num_rows($sql2);
			  if($row_id==1)
			  {
				  $msg= "Venue already reserved for a different event. Change your hall or time";
				  }
			  elseif($row_id==0)
			  {
			    $add=mysql_query("UPDATE h_reservation SET hall_type='$hall' WHERE serial='".$_SESSION['hall']."'") or die(mysql_error());
				$msg="Hall updated successfully";
				unset($_SESSION['hall']);
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
        <?php 
		if(isset($_GET['id']))
				{
					$_SESSION['id']=$_GET['id'];
					echo
					'<form method="post">
					<span><label>Event Date</label></span>
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
						<select name="e_year" required>
						  <option>Year</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option>
						  <option value="2017">2017</option>
						  <option value="2018">2018</option>
						  <option value="2019">2019</option>
						  <option value="2030">2030</option>
						  </select>
						  <input type="submit" name="update_date" value="Update">
					</form><br /><br />';
					}
					if(isset($_POST['update_date'])){ echo $msg;}
		?>
        <?php 
		            if(isset($_GET['e_type']))
					{   
					$_SESSION['eid']=$_GET['e_type'];
					
					echo
						'
						<form method="post">
						<label>Event Type</label><br />
                        <select name="e_type" width="750px" style="width:750px">
                        <option value="">Select</option>
                        <option value="Wedding">Wedding</option>
                        <option value="Fair">Fair</option>
                        <option value="Conference">Conference</option>
                        <option value="Party">Party</option>
                        <option value="Show">Show</option>
                        </select>
						<input type="submit" name="update_etype" value="Update">
						</form>
						';
						
						}
						if(isset($_POST['update_etype'])){ echo $msg;}
						
		?>
        <?php 
		if(isset($_GET['time']))
           {
	        $_SESSION['time']=$_GET['time'];
	         echo
			'
			 <form method="post">
			 <label>Start Time</label><br />
             <select name="start_time"  width="750px" style="width:750px" >
             <option value="">Select...</option>
             <option value="01:00">01:00</option>
             <option value="02:00">02:00</option>
             <option value="03:00">03:00</option>
             <option value="04:00">04:00</option>
             <option value="05:00">05:00</option>
             <option value="06:00">06:00</option>
             <option value="07:00">07:00</option>
             <option value="08:00">08:00</option>
             <option value="09:00">09:00</option>
             <option value="10:00">10:00</option>
             <option value="11:00">11:00</option>
             <option value="12:00">12:00</option>
             <option value="13:00">13:00</option>
             <option value="14:00">14:00</option>
             <option value="15:00">15:00</option>
             <option value="16:00">16:00</option>
             <option value="17:00">17:00</option>
             <option value="18:00">18:00</option>
             <option value="19:00">19:00</option>
             <option value="20:00">20:00</option>
             <option value="21:00">21:00</option>
             <option value="22:00">22:00</option>
             <option value="23:00">23:00</option>
             <option value="00:00">00:00</option>
             </select>
             <br />
             <label>Closing Time</label><br />
             <select name="close_time"  width="750px" style="width:750px" >
             <option value="">Select...</option>
             <option value="01:00">01:00</option>
             <option value="02:00">02:00</option>
             <option value="03:00">03:00</option>
             <option value="04:00">04:00</option>
             <option value="05:00">05:00</option>
             <option value="06:00">06:00</option>
             <option value="07:00">07:00</option>
             <option value="08:00">08:00</option>
             <option value="09:00">09:00</option>
             <option value="10:00">10:00</option>
             <option value="11:00">11:00</option>
             <option value="12:00">12:00</option>
             <option value="13:00">13:00</option>
             <option value="14:00">14:00</option>
             <option value="15:00">15:00</option>
             <option value="16:00">16:00</option>
             <option value="17:00">17:00</option>
             <option value="18:00">18:00</option>
             <option value="19:00">19:00</option>
             <option value="20:00">20:00</option>
             <option value="21:00">21:00</option>
             <option value="22:00">22:00</option>
             <option value="23:00">23:00</option>
             <option value="00:00">00:00</option>
             </select>
			 <input type="submit" name="update_time" value="Update">
			 </form>';
	       }
		   if(isset($_POST['update_time'])){ echo $msg;}
		?>
        <?php 
		if(isset($_GET['payment']))
		{
			$_SESSION['payment']=$_GET['payment'];
			echo
			'
			<form method="post">
			<label>Payment Status</label><br />
            <select name="payment" width="750px" style="width:750px">
            <option value="">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            </select>
			<input type="submit" name="update_payment" value="Update">
			</form>
			';
			}
		if(isset($_POST['update_payment'])){echo $msg;}
		?>
        <?php 
		if(isset($_GET['hall']))
		{
			$_SESSION['hall']=$_GET['hall'];
			$hall_q=mysql_query("SELECT name, serial FROM hall");
			$row=mysql_fetch_assoc($hall_q);
			$_SESSION['serial']=$row['serial'];
			echo
			'<form method="post">
			<select name="hall_type"  width="750px" style="width:750px" >
			<option value="">Select...</option>';
			do
			{
			echo
			'<option value='.$_SESSION['serial'].'>'.$row['name'].'</option>';
			}while($row=mysql_fetch_assoc($hall_q));
			echo
			'</select><br />
			<input type="submit" name="update_hall" value="Update Hall">
			</form>
			';
			}
		if(isset($_POST['update_hall'])){echo $msg;}
		?>
        
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