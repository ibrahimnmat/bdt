<?php   
ob_start(); 
include('include/header.php');
if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']!="admin"){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
}

else {
	require_once('include/mysql_connect.php'); 
	
	$login=$_POST['app_loginname'];
	$password=md5($_POST['app_pwd']);
	$name=$_POST['app_name'];
	$usertype=$_POST['app_type'];
	date_default_timezone_set("Asia/Kuching");
	$date=date("Y-m-d H:i:s");
	$query="select * from user where username='$login'";
	$result=$link->query($query);
	$status_num = $result->num_rows; 
	
	while (ob_get_status()) 
	{
	ob_end_clean();
	}
	
		if($status_num>0)
		{
		$wrong=true;
		header("Location:signuperror.php");
		exit;
		}

		else
		{
	$query2="insert into user(name,username,password,usertype,registerdate)values('$name','$login','$password','$usertype','$date') ";
  	$link->query($query2)or die('Error, insert query failed');
	header("Location:signupcomplete.php");
	exit;
		}
}
include('include/footer.php');?>