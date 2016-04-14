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
?> <fieldset><legend><strong>Maklumat Elektif Pelajar</strong></legend>
<table align="center">
<tr>
	<td>
	Bilangan Dalam Muka Surat : &nbsp
<?php
	require_once('include/mysql_connect.php'); 
	$query 		= "SELECT COUNT(*) AS rowNo FROM elektif";
	$rowData 	= 0;
	if ($result = $link->query($query)){
		$num   = $result->num_rows;
	if($num>0){
		$row = mysqli_fetch_array($result);
		$rowData = $row['rowNo'];
		}
		}
		echo "<a href=admin_elektifall.php?limit=all&page=1>Semua</a>";
		echo "&nbsp&nbsp&nbsp";							
		echo "<a href=admin_elektifall.php?limit=10&page=1>10</a>";
		echo "&nbsp&nbsp&nbsp";
		echo "<a href=admin_elektifall.php?limit=20&page=1>20</a>";
		echo "&nbsp&nbsp&nbsp";
?>
	</td>
</tr></table>
    <br>
 <div align="center"> <a href="admin_elektiftambah.php">
 <u><strong><font color="#0000CC">+ Tambah Maklumat Elektif Pelajar</font></strong></u></a></div>
<table align="center" border="1"  id="headerNav4">
  <tr>
<?php
	echo "<td align='right' width='10' bgcolor=black>";
	echo "<font color='white' face='verdana'>";
	echo "No.</font></td>";
	echo "<td width='150' bgcolor=black>";
	echo "<font color='white' face='verdana'>";
	echo "Elektif</font></a></td>";
?>
	</tr>
<?php
	$query = "SELECT * FROM elektif ORDER BY elektifDesc";
	if($_REQUEST['limit']>0 && $_REQUEST['page']<2)
		$query = $query." LIMIT ".$_REQUEST['limit'];
	else{
		if($_REQUEST['limit']>0){
			$query = $query." LIMIT ".
			($_REQUEST['limit']*($_REQUEST['page']-1))." , ".
			($_REQUEST['limit']);
		}
		}
										
	if ($result = $link->query($query)){
			$num   = $result->num_rows;
			$tmpID = 0;
			$rowNo = 0;
	if($_REQUEST['limit']>0){
			$rowNo = ($_REQUEST['limit']*($_REQUEST['page']-1));
							}
	if($num>0){
	while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td align='right' bgcolor=cccccc>";
	echo (++$rowNo).".";
	echo "</td>";
	echo "<td bgcolor=cccccc>";
	echo $row['elektifDesc'];
	echo "</td>";
	echo "<td bgcolor=RED>"; ?>
    <a href="admin_elektifdelete.php?id=<?php echo $row['elektifDesc']; ?>" onclick="return confirm('Adakah Anda Pasti Untuk Padam Rekod ini?')"> <font color=yellow>PADAM</font> </a> <?php
	echo "</td>";
	echo "</tr>";
	$tmpID++;
	}
	}
	$result->close();
	}
	$link->close();
	?>
	<br>
	</td></tr>
	</table>	<br> <div align="center"> Muka Surat :
	<?php
	if($_REQUEST['limit']>0)
		$limit = $_REQUEST['limit'];
	else
		$limit = $rowData;
	if($_REQUEST['page']>2)
		$prev = $_REQUEST['page'] - 1;
	else
		$prev = 1;
		echo "<a href='admin_elektifall.php?limit=".$_REQUEST['limit'].
			"&page=".$prev."'>Sebelum</a>";
		echo "&nbsp&nbsp&nbsp";
		$int_i=1;	 													
		for(; $int_i<=ceil($rowData/$limit); $int_i++){
		echo "<a href='admin_elektifall.php?limit=".$_REQUEST['limit'].
			"&page=".$int_i."'>".$int_i."</a>";
		echo "&nbsp&nbsp&nbsp";
			if($int_i%25==0)
		echo "<br>";
				}
		if($_REQUEST['page']+1<$int_i)
			$next = $_REQUEST['page'] + 1;
		else
			$next = $_REQUEST['page'];
		echo "<a href='admin_elektifall.php?limit=".$_REQUEST['limit'].
			 "&page=".$next."'>Seterusnya</a>";
?>
</div>
</fieldset>
<?php 
}
include('include/footer.php');?>