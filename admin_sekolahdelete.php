<?php
ob_start();
include('include/header.php');

if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

if(isset($_SESSION['ACCTYPE'])&& ($_SESSION['ACCTYPE']!="admin" && $_SESSION['ACCTYPE']!="pegdata")){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
}

else {
	$id=$_REQUEST['id'];
	$sql="delete from sekolah where sekolahDesc='$id'";
	$link->query($sql)or die('Error, insert query failed');
	while (ob_get_status()) 
	{
	ob_end_clean();
	}
	header("Location:admin_sekolahall.php");
	exit;
	}
include('include/footer.php');?>