<?php
	require_once('confiq.php');
	$uname=mysql_real_escape_string($_POST['uname']);
	$pword=mysql_real_escape_string($_POST['pword']);
	$sql=mysql_query("select uname, pword, name from users where uname='$uname' AND pword='$pword'") or die(mysql_error());
	$row=mysql_num_rows($sql);
	$name=mysql_fetch_assoc($sql);
	if($row==0)
	{
		$msg="invalid login details";
		}
		elseif($row>0)
		{
			$_SESSION['name']=$name['name'];
			header('location:admin.php');
			}
	
?>