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
function FixQuotes ($what = "") {
	$what = ereg_replace("'","''",$what);
	while (eregi("\\\\'", $what)) {
		$what = ereg_replace("\\\\'","'",$what);
	}
	return $what;
}

	$title = ereg_replace("\"", "''", $_POST['title']);
	$title2 = FixQuotes($title);
	
	$chkquery="select * from ambilan where ambilanDesc='$title2'";
	$result=$link->query($chkquery);
	$num = $result->num_rows; 

	if($num!=0)
	{?>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-style: italic;
	font-weight: bold;
	font-size: large;
}
-->
</style>

	<span class="style1">Ralat....Rekod ini telah wujud !!!	</span><br>
	<br>
	Sila tekan butan 'Kembali' untuk pembetulan...<br>
		<br><input type=button value="KEMBALI" onclick="javascript:history.go(-1)" class=button>
	<?php }
	else
	{
	$sql="insert into ambilan(ambilanDesc)values('$title2')";
	$link->query($sql)or die('Error, insert query failed');
	while (ob_get_status()) 
	{
	ob_end_clean();
	}
	header("Location:admin_ambilanall.php");
	exit;
	}
}
include('include/footer.php');?>