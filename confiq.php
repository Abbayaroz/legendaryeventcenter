<?php

	@mysql_connect("localhost","root","") or die("Demo is not available, please try again later");
	@mysql_select_db("legendary_db") or die("Demo is not available, please try again later");
	session_start();

?>