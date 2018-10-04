<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
require_once('confiq.php'); 

$fError="";
$lError="";
$pError="";
$dayError="";
$monthError="";
$yearError="";
$timeError="";
$typeError="";
$hallError="";
$colorError="";
$amountError="";
$b_Error="";
$Error=0;
$successMsg="";
if(isset($_POST['reserv']))
{ 


	$fname=mysql_real_escape_string($_POST['fname']);
	$lname=mysql_real_escape_string($_POST['lname']);
	$email=mysql_real_escape_string($_POST['email']);
	$pno=mysql_real_escape_string($_POST['pno']);
	$e_day=mysql_real_escape_string($_POST['e_day']);
	$e_month=mysql_real_escape_string($_POST['e_month']);
	$e_year=mysql_real_escape_string($_POST['e_year']);
	$e_time=mysql_real_escape_string($_POST['e_time']);
	$e_type=mysql_real_escape_string($_POST['e_type']);
	$h_type=mysql_real_escape_string($_POST['h_type']);
	$d_color=mysql_real_escape_string($_POST['d_color']);
	$a_paid=mysql_real_escape_string($_POST['a_paid']);
	$ballance=mysql_real_escape_string($_POST['balance']);
	

	$add=mysql_query("INSERT INTO h_reservation(fname, lname, email, pno, e_day, e_month, e_year, e_time, e_type, h_type, d_color, a_paid, balance, total_payment) VALUES('$fname','$lname','$email','$pno','$e_day','$e_month','$e_year','$e_time','$e_type','$h_type','$d_color','$a_paid','$ballance', '$a_paid+$ballance')") or die(mysql_error());
	$_SESSION['id']=mysql_insert_id();
	header("Location:invoice.php");
	}

?>
<!DOCTYPE html>
<html>
<title>Meena Event Centre | New Reservation</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>

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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
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
						<li ><a href="search.php">Search Reservation</a></li>
						<li><a href="cancel.php" >Cancel Reservation</a></li>
						<li><a href="update.php" >Update Reservation</a></li>
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
					<h5 align="center">Welcome:<?php echo '&nbsp;'.$_SESSION['name']?>&nbsp;|&nbsp;<a href="admin.php">Sign Out</a></h5>
				</div>
				<div class="clearfix"> </div>
				</div>
		</div>
	</div>
	<!---->
	<div class="content">
		<div class="container"> 			         
		<div class="register">
		  	  <form method="post"> 
				 <div class="  register-top-grid">
					<h3>NEW RESERVATION</h3>
					<div class="mation">
						<span>First Name<label>*</label></span><span id="sprytextfield1">
						<input type="text" name="fname" id="fname">
						<span class="textfieldRequiredMsg">A value is required.</span></span><span>Last Name<label>*</label></span><span id="sprytextfield2">
						<input type="text" name="lname" id="lname">
						<span class="textfieldRequiredMsg">A value is required.</span></span><span>Email Address<label></label></span><span id="sprytextfield3">
						<input type="text" name="email" id="email">
						<span class="textfieldInvalidFormatMsg">Invalid format.</span></span><span>Phone Number<label>*</label></span><span id="sprytextfield4">
						<input type="text" name="pno" id="pno">
						<span class="textfieldRequiredMsg">A value is required.</span></span><span>Event Date<label>*</label></span><span id="spryselect1">
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
						<span class="selectRequiredMsg">Please select an item.</span></span><span id="spryselect2">
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
						<span class="selectRequiredMsg">Please select an item.</span></span><span id="spryselect3">
						<select name="e_year">
						  <option>Year</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option>
						  <option value="2017">2017</option>
						  <option value="2018">2018</option>
						  <option value="2019">2019</option>
						  <option value="2030">2030</option>
						  </select>
						<span class="selectRequiredMsg">Please select an item.</span></span><span>Event Time<label>*</label></span><span id="sprytextfield5">
						<input type="text" name="e_time" id="e_time">
						<span class="textfieldRequiredMsg">A value is required.</span></span><span>Event Type<label>*</label></span><span id="sprytextfield6">
						<input type="text" name="e_type" id="e_type">
						<span class="textfieldRequiredMsg">A value is required.</span></span><span>Hall Type<label>*</label></span><span id="spryselect4">
						<select name="h_type">
						  <option value="">Select</option>
						  <option value="Marquee">Marquee</option>
						  <option value="Gold">Gold</option>
						  <option value="Silver">Silver</option>
						  </select>
						<span class="selectRequiredMsg">Please select an item.</span></span><span>decoration Color<label>*</label></span><span id="sprytextfield7">
						<input type="text" name="d_color" id="d_color">
						<span class="textfieldRequiredMsg">A value is required.</span></span><span>Amount Paid<label>*</label></span><span id="sprytextfield8">
						<input type="text" name="a_paid" id="a_paid">
						<span class="textfieldRequiredMsg">A value is required.</span></span><span>Balance<label>*</label></span><span id="sprytextfield9">
						<input type="text" name="balance" id="balance">
						<span class="textfieldRequiredMsg">A value is required.</span></span></div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <input type="submit" name="reserv" value="Save">
					   </a>
					 </div>
				     
				</form>
		   </div>
		 </div>
	</div>
	<!---->
	<div class="footer">
		<div class="container">
				<div class="footer-class">
				<div class="class-footer">
			<p class="footer-grid">&copy; 2016 Designed by <a href="#" target="_blank">Ahaleem</a> </p>
				</div>
				<div class="clearfix"> </div>
			 	</div>
		 </div>
	</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
</script>
</body>
</html>