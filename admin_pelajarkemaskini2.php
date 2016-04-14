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
	require_once('include/mysql_connect.php');
	
	function FixQuotes ($what = "") {
	$what = ereg_replace("'","''",$what);
	while (eregi("\\\\'", $what)) {
		$what = ereg_replace("\\\\'","'",$what);
	}
	return $what;
}

	$idpengguna=$_POST['app_idpengguna'];
	$name=$_POST['app_name'];
	$ic=$_POST['app_noic'];
	$ambilan=$_POST['app_ambilan'];
	$kursus=$_POST['app_major'];
	$elektif=$_POST['app_elektif'];
	$sekolah = ereg_replace("\"", "''", $_POST['app_sekolah']);
	$sekolah2 = FixQuotes($sekolah);
	$pensyarah=$_POST['app_pensyarah'];
	$pensyarah2=$_POST['app_pensyarah2'];
	$guru=$_POST['app_guru'];
	$tempoh=$_POST['app_tempoh'];
	$contact=$_POST['app_mphone'];
	$email=$_POST['app_email'];


$updatesql="update pelajar set name='$name',icno='$ic',intake='$ambilan',major='$kursus',elektif='$elektif',pensyarah='$pensyarah',pensyarah2='$pensyarah2',gurubimbing='$guru',sekolah='$sekolah2',tempoh='$tempoh',contact='$contact',email='$email' where username='$idpengguna'";

	$link->query($updatesql)or die('Error, insert query failed');
	
	$updatesql2="update user set name='$name' where username='$idpengguna'";

	$link->query($updatesql2)or die('Error, insert query failed');
	
	while (ob_get_status()) 
	{
	ob_end_clean();
	}
	
header("Location:admin_maklumatpelajar2a.php?id=$ambilan&major=$kursus");
exit;
	}
include('include/footer.php');?>