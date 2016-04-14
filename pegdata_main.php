<?php 
ob_start(); 
include('include/header.php');
if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']!="pegdata"){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
}

else {
?>
	
<?php 
}
include('include/footer.php');
ob_flush();?>