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
   ob_start();
   require_once('include/mysql_connect.php'); 
	
	$login=$_POST['app_loginname'];
	$password=md5($_POST['app_pwd']);
	$name=$_POST['app_name'];
	date_default_timezone_set("Asia/Kuching");
	$date=date("Y-m-d H:i:s");
	
	$noic=$_POST['app_noic'];
	$ambilan=$_POST['app_ambilan'];
	$kursus=$_POST['app_kursus'];
	$elektif=$_POST['app_elektif'];
	$contact=$_POST['app_mphone'];
	$email=$_POST['app_email'];

	$query="select * from user where username='$login'";
	$result=$link->query($query);
	$status_num = $result->num_rows; 
	
	$query2="select * from pelajar where icno='$noic'";
	$result2=$link->query($query2);

	$status_num2 = $result2->num_rows; 
	
	while (ob_get_status()) 
	{
	ob_end_clean();
	}
		if($status_num!=0)
		{
			$wrong=true;
		header("Location:signuperror.php");
		exit;
		}
	
		else if($status_num2!=0)
		{
			$wrong=true;
		header("Location:signuperrorIC.php");
		exit;
		}
	else
	{
	$query3="insert into pelajar(name,username,icno,intake,major,elektif,contact,email)values('$name','$login','$noic','$ambilan','$kursus','$elektif','$contact','$email')";
	$query4="insert into user(name,username,password,usertype,registerdate)values('$name','$login','$password','pelajar','$date') ";

	
  	$link->query($query3)or die('Error, insert query failed');
	$link->query($query4)or die('Error, insert query failed');
	
	header("Location:signupcomplete.php");
	exit;
	}
}
include('include/footer.php');?>