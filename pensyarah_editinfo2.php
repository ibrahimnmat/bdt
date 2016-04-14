<?php  
	session_start(); 
	header("Cache-control: private");
	require_once('include/mysql_connect.php');
	ob_start();
	$id=$_SESSION['USERID'];
	$name=$_POST['app_name'];
	$position=$_POST['app_position'];
	$department=$_POST['app_department'];
	$contact=$_POST['app_mphone'];
	$email=$_POST['app_email'];

	$sql="select * from pensyarah, user where user.username='$id' AND user.username=pensyarah.username";
	
	$result = $link->query($sql);
	$row = mysqli_fetch_array($result);
	$a=$row['name'];
	
	$updatesql="update pensyarah,user set user.name='$name',pensyarah.name='$name', pensyarah.position='$position',pensyarah.department='$department',pensyarah.contact='$contact',pensyarah.email='$email' where user.username='$id' AND pensyarah.name='$a'";

	$link->query($updatesql)or die('Error, insert query failed');
	while (ob_get_status()) 
	{
	ob_end_clean();
	}
	header("Location:pensyarah_personalia.php");
	exit;
?>