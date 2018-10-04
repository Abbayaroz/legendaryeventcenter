<?php
require_once("confiq.php");
$day_error="";
	$month_error="";
	$year_error="";
	$s_time_error="";
	$c_time_error="";
	$d_type_error="";
	$d_color_error="";
	$h_type_error="";
	$e_type_error="";
	$error=0;
	$msg="";
if(isset($_POST['reserv']))
{
	$day=mysql_real_escape_string($_POST['e_day']);
	$month=mysql_real_escape_string($_POST['e_month']);
	$year=mysql_real_escape_string($_POST['e_year']);
	$s_time=mysql_real_escape_string($_POST['start_time']);
	$c_time=mysql_real_escape_string($_POST['close_time']);
	$d_type=mysql_real_escape_string($_POST['deco_type']);
	$d_color=mysql_real_escape_string($_POST['d_color']);
	$h_type=mysql_real_escape_string($_POST['hall_type']);
	$e_type=mysql_real_escape_string($_POST['e_type']);
	if(empty($day))
	{
	$day_error='<font color="#FF0000">Select day.</font>';
	$error=1;
	}
	if(empty($month))
	{
	$month_error='<font color="#FF0000">Select month.</font>';
	$error=1;
	}
	if(empty($year))
	{
	$year_error='<font color="#FF0000">Select year.</font>';
	$error=1;
	}
	if(empty($s_time))
	{
	$s_time_error='<font color="#FF0000">Start time required.</font>';
	$error=1;
	}
	if(empty($c_time))
	{
	$c_time_error='<font color="#FF0000">Closing time required.</font>';
	$error=1;
	}
	if(empty($d_type))
	{
	$d_type_error='<font color="#FF0000">Decoration type required.</font>';
	$error=1;
	}
	if(empty($d_color))
	{
	$d_color_error='<font color="#FF0000">Decoration color required.</font>';
	$error=1;
	}
	if(empty($h_type))
	{
	$h_type_error='<font color="#FF0000">Hall type required.</font>';
	$error=1;
	}
	if(empty($e_type))
	{
	$e_type_error='<font color="#FF0000">event type required.</font>';
	$error=1;
	}
	if($year<date('Y'))
	{
		$year_error='<font color="#FF0000">Selected year cannot be less than the current year.</font>';
		$error=1;
		}
	if($year == date('Y') && $month< date('m'))
	{
		$month_error='<font color="#FF0000">Month cannot be less than current month for a current year.</font>';
		$error=1;
		}
	if($year==date('Y') && $month==date('m') && $day<=date('d'))
	{
		$day_error='<font color="#FF0000">Day cannot be less than current day for a current month and year.</font>';
		$error=1;
		}
	if($c_time <= $s_time)
	{
		$s_time_error='<font color="#FF0000">Start time cannot be less than or same as closing time .</font>';
		$error=1;
		}
	if($error==0)
	{
		$sql=mysql_query("SELECT e_day, e_month, e_year, start_time, close_time, hall_type FROM h_reservation WHERE e_day='$day' AND e_month='$month' AND e_year='$year' AND start_time='$s_time' AND close_time='$c_time' AND hall_type='$h_type'");
		$row_reserve=mysql_num_rows($sql);
		if($row_reserve>0)
		{$msg='<font color="#FF0000">The hall you have choosen have been taken by someone else. Change your event time or select a different hall.</font>';}
		elseif($row_reserve==0)
		{
			$h_price=mysql_query("select serial, price, name from hall where serial='".$_SESSION['serial']."'") or die(mysql_error());
			$price_h=mysql_fetch_assoc($h_price);
			
			$d_price=mysql_query("select serial, price, name from deco where serial='".$_SESSION['deco_serial']."'") or die(mysql_error());
			$price_d=mysql_fetch_assoc($d_price);
			
			$amount=($price_d['price']+$price_h['price']);
			$add=mysql_query("INSERT INTO h_reservation(e_day, e_month, e_year, start_time, close_time, e_type, hall_type, deco_type, d_color, total_amount, r_date, customerid) VALUES('$day','$month','$year','$s_time','$c_time','$e_type','$h_type','$d_type','$d_color','$amount',now(),'".$_SESSION['customerid']."')") or die(mysql_error());
			$_SESSION['id']=mysql_insert_id();
			$_SESSION['h_price']=$price_h['price'];
			$_SESSION['d_price']=$price_d['price'];
			$_SESSION['d_name']=$price_d['name'];
			$_SESSION['h_name']=$price_h['name'];
			$_SESSION['etype']=$e_type;
			$_SESSION['stime']=$s_time;
			$_SESSION['ctime']=$c_time;
			$_SESSION['date']=$day.'/'.$month.'/'.$year;
			header("Location:payment.php");
			}
		}
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
<title>Legendary Event Centre | Reservation :: </title>
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
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script> 
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
					<label>Welcome| <?php echo $_SESSION['name'];?></label>
                    <form>
						
					</form>
					<a href="invoice.php?logout=logout" class="sign-in">|Logout</a>
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
						<li ><a href="index.php">HOME </a></li>
						<li><a href="about.php" >ABOUT US</a></li>
						<li><a href="gallery.php" >GALLERY</a></li>
						<li><a href="login.php">RESERVATION</a></li>
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
		<div class="single">
		<div class="col-md-9">
			
		<div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					   <ul class="resp-tabs-list">
						  <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>Reservation</span></li>
					   </ul>				  	 
							<div class="resp-tabs-container">
							    <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Please Create Account Here</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
								  <div class="facts">
                                    <form name="login" method="post" action="">
                                    <fieldset><legend></legend>
                                   <table border="0" width="103%">
                                      <tr>
                                        <td colspan="3"><label>Event Date</label></td>
                                      </tr>
                                      <tr>
                                      <td width="188" height="38">
                                      <select name="e_day" width="250px" style="width:250px" >
                                          <option value="">Day</option>
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
                                        </td>
                                        <td width="207">
                                          <select name="e_month"  width="250px" style="width:250px" >
                                          <option value="">Month</option>
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
                                          </td>
                                        <td width="219">
                                        <select name="e_year"  width="250px" style="width:250px" >
                                          <option value="">Year</option>
                                          <option value="2015">2015</option>
                                          <option value="2016">2016</option>
                                          <option value="2017">2017</option>
                                          <option value="2018">2018</option>
                                          <option value="2019">2019</option>
                                          <option value="2030">2030</option>
                                         </select>
                                        </td>
                                      </tr>
                                      <tr>
                                      <td height="56" colspan="3">
                                       <?php if(isset($_POST['reserv'])){echo $day_error;} ?><br />
                                       <?php if(isset($_POST['reserv'])){echo $month_error;} ?> <br />
                                       <?php if(isset($_POST['reserv'])){echo $year_error;} ?></td>
                                      </tr>
                                      <tr>
                                      <td height="56" colspan="3">
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
                                      <?php if(isset($_POST['reserv'])){echo $s_time_error;} ?>
                                      </td>
                                      </tr>
                                      <tr>
                                      <td height="56" colspan="3">
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
                                      <br />
                                      <?php if(isset($_POST['reserv'])){echo $c_time_error;} ?>
                                      </td>
                                      </tr>
                                      <tr>
                                        <td height="56" colspan="3">
                                        <label>Event Type</label><br />
                                        <select name="e_type" width="750px" style="width:750px">
                                        <option value="">Select</option>
                                        <option value="Wedding">Wedding</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Conference">Conference</option>
                                        <option value="Party">Party</option>
                                        <option value="Show">Show</option>
                                        </select><br />
                                        <?php if(isset($_POST['reserv'])){echo $e_type_error;} ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td height="63" colspan="3">
                                        <label>Decoration Colour</label><br />
                                        <input name="d_color" type="text" size="100" placeholder="White, gold..." value=" <?php if(isset($_POST['reserv'])){echo $d_color;} ?>" required><br />
                                        <?php if(isset($_POST['reserv'])){echo $d_color_error;} ?>
                                        </td>
                                        </tr>
                                      <tr>
                                      <tr>
                                        <td height="49" colspan="3">
                                        <label>Hall Type</label><br />
                                        <?php
                                        $hall_q=mysql_query("SELECT name, serial FROM hall");
										$row=mysql_fetch_assoc($hall_q);
										$_SESSION['serial']=$row['serial'];
										echo
										'<select name="hall_type"  width="750px" style="width:750px" >
										<option value="">Select...</option>';
										do
										{
										echo
										'<option value='.$row['serial'].'>'.$row['name'].'</option>';
										}while($row=mysql_fetch_assoc($hall_q));
										echo
										'</select><br />';	
										?>
                                        <?php if(isset($_POST['reserv'])){echo $h_type_error;} ?>
                                        </td>
                                        </tr>
                                      <tr>
                                      <tr>
                                        <td height="55" colspan="3">
                                        <label>Decoration Type</label><br />
                                       <?php
                                        $dec_q=mysql_query("SELECT name, serial FROM deco");
										$deco=mysql_fetch_assoc($dec_q);
										$_SESSION['deco_serial']=$deco['serial'];
										
										echo
										'<select name="deco_type"  width="750px" style="width:750px" >
										<option value="">Select...</option>';
										do
										{
										echo
										'<option value='.$deco['serial'].'>'.$deco['name'].'</option>';
										}while($deco=mysql_fetch_assoc($dec_q));
										echo '</select> <br />';
										?>
                                        <?php if(isset($_POST['reserv'])){echo $d_type_error;} ?>
                                        </td>
                                      </tr>
                                       <tr>
                                        <td colspan="3" align="right">
                                        </td>
                                      </tr> 
                                      <tr>
                                        <td colspan="3" align="right">
                                        <input name="reserv" type="submit" value="Reserve">
                                        </td>
                                      </tr>
                                    </table>
                                    </fieldset>
                                    </form>
                                    </div>
							    	</div>
							 </div>
					      </div>
					 </div>
					 <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>	

	</div>
	</div>
	<!---->
	<div class="col-md-3">
	  <div class="w_sidebar">
		<section  class="sky-form">
					<h4>catogories</h4>
						<div class="row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Marquee</label>
							
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Gold</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Silver</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>salwar</label>	
							</div>
						</div>
		</section>
		
	</div>
   </div>
   <div class="clearfix"> </div>
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