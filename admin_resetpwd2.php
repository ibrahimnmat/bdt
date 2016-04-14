<?php	
include('include/header.php');
header("Cache-control: private");
	
if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

if(isset($_SESSION['ACCTYPE'])&& ($_SESSION['ACCTYPE']!="admin" && $_SESSION['ACCTYPE']!="pegdata")){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
}

else {
	require_once("include/mysql_connect.php");  
	$id=$_REQUEST['id'];
	$newpwd=md5 ($_POST['newpwd']);
	$query="update user set password='$newpwd' where username='$id'";
	$link->query($query)or die('Error, insert query failed');
	echo"<strong><font color=blue>Kata Laluan Bagi ID Pengguna <i>$id</i> Telah Berjaya Diset Semula!</font></strong>";
?>
<br><br>
	<div align="center"><input type=button value="KEMBALI" onclick="javascript:history.go(-2)" class=button> </div>

<?php
}
include('include/footer.php');?>