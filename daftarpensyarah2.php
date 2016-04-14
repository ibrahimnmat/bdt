<?php   
include('include/header.php');

if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

if(isset($_SESSION['ACCTYPE'])&& ($_SESSION['ACCTYPE']!="admin" && $_SESSION['ACCTYPE']!="pegdata")){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
}

else {
   require_once('include/mysql_connect.php'); 
	ob_start(); 
	$login=$_POST['app_loginname'];
	$password=md5($_POST['app_pwd']);
	$name=$_POST['app_name'];
	date_default_timezone_set("Asia/Kuching");
	$date=date("Y-m-d H:i:s");
	
	$position=$_POST['app_position'];
	$department=$_POST['app_department'];
	$contact=$_POST['app_mphone'];
	$email=$_POST['app_email'];

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
		}
	
	else
	{
	$query2="insert into user(name,username,password,usertype,registerdate)values('$name','$login','$password','pensyarah','$date') ";
	$query3="insert into pensyarah(name,username,position,department,contact,email)values('$name','$login','$position','$department','$contact','$email')";
	
  	$link->query($query2)or die('Error, insert query failed');
	$link->query($query3)or die('Error, insert query failed');
	
	header("Location:signupcomplete.php");
	}
}
include('include/footer.php');?>