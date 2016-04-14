<?php 
require_once("include/mysql_connect.php"); 
$status_userid = $_SESSION['USERID'];	
		 	
date_default_timezone_set("Asia/Kuching");
$status_datetime = date("Y-m-d H:i:s");
$query = "UPDATE user SET lastvisitDate ='$status_datetime' WHERE username='$status_userid'";
$result=$link->query($query);		 
?>