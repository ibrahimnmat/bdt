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
	$ambilan=$_REQUEST['id'];
	$kursus=$_REQUEST['major'];

?> <fieldset><legend><strong>Maklumat Pelajar Praktikum Bagi <?php echo $ambilan?> (<?php echo $kursus?>)</strong></legend>
								
<table align="center" border="1"  id="headerNav4">
     <tr>
<?php
		echo "<td align='right' width='10' bgcolor=black>";
		echo "<font color='white' face='verdana'>";
		echo "No.</font></td>";
		echo "<td width='150' bgcolor=black>";
		echo "<font color='white' face='verdana'>";
		echo "Nama Pelajar</font></a></td>";
		echo "<td width='150' bgcolor=black>";
		echo "<font color='white' face='verdana'>";
		echo "No Kad Pengenalan</font></a></td>";
	?>
	</tr>
<?php
$query = "SELECT * FROM PELAJAR WHERE INTAKE='$ambilan' AND MAJOR='$kursus' ORDER BY name";
										
	if ($result = $link->query($query)){
		$num   = $result->num_rows;
		$rowNo = 0;
	if($num>0){
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td align='right' bgcolor=cccccc>";
		echo (++$rowNo).".";
		echo "</td>";
		echo "<td bgcolor=cccccc>";
		echo $row['name'];
		echo "</td>";
		echo "<td bgcolor=cccccc>";
		echo $row['icno'];
		echo "</td>";
		echo "<td bgcolor=BLUE>"; ?>
		 <a href="admin_pelajarkemaskini.php?id=<?php echo $row['icno']; ?>"> <font color=yellow>KEMASKINI</font> </a> <?php
		echo "</td>";
		echo "</tr>";
		}
		}
		$result->close();
		}
		$link->close();
?>
		<br>
		</td></tr>
		</table>	
	</fieldset>
<?php 
}
include('include/footer.php');?>