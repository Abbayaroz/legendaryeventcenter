<?php
require_once("confiq.php");
if(isset($_GET['logout']))
{
	session_unset();
	header('location:index.php');
	}	
$c_no_error="";
$expm_error="";
$expy_error="";
$csc_error="";
$error=0;
$msg="";
if(isset($_POST['pay']))
{
	$c_no=mysql_real_escape_string($_POST['c_no']);
	$expm=mysql_real_escape_string($_POST['e_month']);
	$expy=mysql_real_escape_string($_POST['e_year']);
	$csc=mysql_real_escape_string($_POST['code']);
if(empty($c_no))
{
	$c_no_error='<font color="#FF0000">Card number cannot be empty.</font>';
	$error=1;
	}
	if(empty($expm))
	{
	$expm_error='<font color="#FF0000">value required.</font>';
	$error=1;
	}
	if(empty($expy))
	{
	$expy_error='<font color="#FF0000">value required.</font>';
	$error=1;
	}
	if(empty($c_no))
	{
	$csc_error='<font color="#FF0000">value required.</font>';
	$error=1;
	}
	if($error==0)
	{
		$insert=mysql_query("insert into payment (card_no, exp_year, exp_month, csc, reserv_id, date) values('$c_no','$expy','$expm','$csc','".$_SESSION['id']."',now())") or die(mysql_error());
		$update=mysql_query("update h_reservation set payment_status = 'Yes' where serial='".$_SESSION['id']."'") or die(mysql_query());
		header('Location:invoice.php');
		
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
<title>Legendary Event Centre | Payment :: </title>
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
						<li><a href="contact.php" class="scroll">Contact</a></li>
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
					<a href="index.php"><img src="images/logo.png" alt=""></a>
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
						  <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>Make your payment here</span></li>
					   </ul>				  	 
							<div class="resp-tabs-container">
							    <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Please Create Account Here</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
								  <div class="facts">
                                    <form name="payment" method="post" action="">
                                    <fieldset><legend></legend>
                                    <table width="678" border="1">
                                      <tr>
                                        <td width="668"><strong>Payment Summary</strong>
											<table width="671" border="0">
                                 			  <tr>
                                                <td width="418"><strong>Description</strong></td>
                                                <td width="237"><strong>Item Price</strong></td>
                                              </tr>
                                              <tr>
                                                <td>Hall: <?php echo $_SESSION['h_name'];?></td>
                                                <td><?php echo $_SESSION['h_price'];?></td>
                                              </tr>
                                              <tr>
                                                <td>Decoration: <?php echo $_SESSION['d_name'];?></td>
                                                <td><?php echo $_SESSION['d_price'];?></td>
                                              </tr>
                                              <tr>
                                                <td><div align="right"><strong>Total</strong></div></td>
                                                <td><?php echo ($_SESSION['d_price']+$_SESSION['h_price']); ?></td>
                                              </tr>
                                            </table>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td height="289" valign="top">
                                        <p><strong>Billing Information </strong></p>
                                        <table width="668" border="1">
                                          <tr>
                                            <td colspan="3" valign="top"><div align="left"><strong>Payment Option</strong><br>
                                                <font size="-1">Enter your payment details below</font><img src="images/master.jpg" width="153" height="74" alt="mastercard"><img src="images/visa.jpg" width="154" height="74" alt="Visacard"><img src="images/verve.jpg" width="158" height="74" alt="vervecard"></div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="263"><strong>Credit card*</strong></td>
                                            <td colspan="2"><input name="c_no" type="text" id="c_no" size="80"></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td colspan="2">Credit card number</td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td width="192">
                                            <select name="e_month" id="e_month">
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
                                            </select></td>
                                            <td width="191">
                                            <select name="e_year" id="e_year">
                                              <option value="">Year</option>
                                              <option value="2015">2015</option>
                                              <option value="2016">2016</option>
                                              <option value="2017">2017</option>
                                              <option value="2018">2018</option>
                                              <option value="2019">2019</option>
                                              <option value="2030">2030</option>
                                            </select> </td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Expiry Month</td>
                                            <td>Year</td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td><input type="text" name="code" id="code"></td>
                                            <td>&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td height="20">&nbsp;</td>
                                            <td>Code</td>
                                            <td><input type="submit" name="pay" id="pay" value="Pay"></td>
                                          </tr>
                                        </table></td>
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