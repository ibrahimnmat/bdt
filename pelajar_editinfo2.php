<?php  
	session_start(); 
	header("Cache-control: private");
	require_once('include/mysql_connect.php');
	ob_start();
	$id=$_SESSION['USERID'];
	$name=$_POST['app_name'];
	$contact=$_POST['app_mphone'];
	$email=$_POST['app_email'];
	$sql="select * from pelajar, user where user.username='$id' AND user.username=pelajar.username";
	$result = $link->query($sql);
	$row = mysqli_fetch_array($result);
	$a=$row['name'];
	$updatesql="update pelajar,user set user.name='$name',pelajar.name='$name',pelajar.contact='$contact',pelajar.email='$email' where user.username='$id' AND pelajar.name='$a'";

	$link->query($updatesql)or die('Error, insert query failed');
	
	while (ob_get_status()) 
	{
	ob_end_clean();
	}
	
	header("Location:pelajar_personalia.php");
	exit;
?>