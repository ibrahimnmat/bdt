<?php	
	session_start(); 
	header("Cache-control: private");
	ob_start(); 
	require_once("include/mysql_connect.php");  
	$id=$_SESSION['USERID'];
	
	$oldpwd=md5 ($_POST['oldpwd']);
	$newpwd=md5 ($_POST['newpwd']);

	$query="select password from user where username='$id'";
	$result=$link->query($query);
	$row = mysqli_fetch_array($result);
	
	while (ob_get_status()) 
	{
	ob_end_clean();
	}
	
	if($row['password']!=$oldpwd)
	{
		header("Location:chgpwd.php?msg=1");
	}
	else
	{
		$query2="update user set password='$newpwd' where username='$id'";
		$link->query($query2)or die('Error, insert query failed');
		header("Location:chgpwd.php?msg=2");
	}
?>