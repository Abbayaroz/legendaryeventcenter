<?php
require_once("confiq.php");
if(isset($_POST['login']))
{
	$emailerror="";
	$pworderror="";
	$fnameerror="";
	$lnameerror="";
	$pnoerror="";
	$cpworderror="";
	$error=0;
	$failsignup="";
	$email=mysql_real_escape_string($_POST['email']);
	$pword=mysql_real_escape_string($_POST['pword']);
	$pword2=mysql_real_escape_string($_POST['pword2']);
	$fname=mysql_real_escape_string($_POST['fname']);
	$lname=mysql_real_escape_string($_POST['lname']);
	$pno=mysql_real_escape_string($_POST['pno']);
	if(empty($email))
	{
		$emailerror='<font color="#FF0000">'."Please enter your email.".'</font>';
		$error==1;
		}
	if(empty($pword))
	{
		$pworderror='<font color="#FF0000">'."Please enter your password.".'</font>';
		$error==1;
		}
	if(empty($fname))
	{
		$fnameerror='<font color="#FF0000">'."Please enter your first name.".'</font>';
		$error==1;
		}
	if(empty($lname))
	{
		$lnameerror='<font color="#FF0000">'."Please enter your last name.".'</font>';
		$error==1;
		}
	if(empty($pno))
	{
		$pnoerror='<font color="#FF0000">'."Please enter your phone number.".'</font>';
		$error==1;
		}
	if($pword != $pword2)
	{
		$cpworderror='<font color="#FF0000">'."Password does not match.".'</font>';
		$error==1;
		}
	if($error==0)
	{
	$sql=mysql_query("SELECT email FROM customer WHERE email='$email' ") or die (mysql_error());
	$row=mysql_num_rows($sql);
	if($row==1)
	{
		$failsignup='<font color="#FF0000">'."Some one has created account using same email address.".'</font>';
	}
	elseif($row==0)
	{
		$insert=mysql_query("INSERT INTO customer (fname, lname, email, pno, pword) VALUES('$fname','$lname','$email','$pno','$pword')");
		mysql_insert_id();
		$_SEESION['customerid']=mysql_insert_id();
		$_SESSION['name']=$fname;
		$_SESSION['lname']=$lname;
		header("location:confirm.php");
		}
	}}
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
<title>Legendary Event Centre | Sign Up Page :: </title>
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
					<a href="#" class="sign-in">Sign In</a>
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
						  <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>Please Create Account Here</span></li>
					   </ul>				  	 
							<div class="resp-tabs-container">
							    <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Please Create Account Here</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
								  <div class="facts">
                                    <form name="login" method="post" action="">
                                    <fieldset><legend></legend>
                                    <table width="594">
                                    <tr>
                                    <td>
                                    <?php if(isset($_POST['login'])){echo $failsignup;}?><br />
                                    <label>First name</label><br />
                                    <input name="fname" type="text" size="80" value="<?php if(isset($_POST['login'])){echo $fname;}?>"><br />
                                    <?php if(isset($_POST['login'])){echo $fnameerror;}?>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <br />
                                    <label>Last name</label><br />
                                    <input name="lname" type="text" size="80" value="<?php if(isset($_POST['login'])){echo $lname;}?>"><br />
                                      <?php if(isset($_POST['login'])){echo $lnameerror;}?>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <br />
                                   <label>Email Address</label><br />
								    <input name="email" type="text" id="email" value="<?php if(isset($_POST['login'])){echo $email;}?>" size="80"><br />
                                      <?php if(isset($_POST['login'])){echo $emailerror;}?>
                                    </td>
                                    </tr>
                                     <tr>
                                    <td>
                                    <br />
                                    <label>Phone number</label><br />
                                    <input name="pno" type="text" size="80" value="<?php if(isset($_POST['login'])){echo $pno;}?>"><br />
                                      <?php if(isset($_POST['login'])){echo $pnoerror;}?>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <br />
                                    <label>Password</label><br />
							          <input name="pword" type="password" id="pword" value="<?php if(isset($_POST['login'])){echo $pword;}?>" size="80"><br />
                                      <?php if(isset($_POST['login'])){echo $pworderror;}?>
								    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <br />
                                    <label>Confirm Password</label><br />
                                    <input name="pword2" type="password" size="80" value="<?php if(isset($_POST['login'])){echo $pword2;}?>"><br />
                                      <?php if(isset($_POST['login'])){echo $cpworderror;}?>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td> 
                                    <br /> 
                                      <input type="submit" name="login" id="login" value="Sign In">
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