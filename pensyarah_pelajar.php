<?php   
session_start();
include('include/header.php');

if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']!="pensyarah"){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
	}
else {
	require_once('include/mysql_connect.php');
	$id=$_SESSION['USERID'];
	?>
<fieldset><legend><strong>Pelajar Seliaan</strong></legend>
					
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
											echo "Ambilan</font></a></td>";
											echo "<td width='150' bgcolor=black>";
											echo "<font color='white' face='verdana'>";
											echo "Pengkhususan</font></a></td>";
											echo "<td width='150' bgcolor=black>";
											echo "<font color='white' face='verdana'>";
											echo "Elektif</font></a></td>";
											echo "<td width='150' bgcolor=black>";
											echo "<font color='white' face='verdana'>";
											echo "Sekolah Praktikum</font></a></td>";
										?>
									</tr>
									<?php
			$query="select * from pensyarah, pelajar where pensyarah.username='$id' AND (pensyarah.name=pelajar.pensyarah OR pensyarah.name=pelajar.pensyarah2)";										
																	
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
?>  <a href="pensyarah_viewpelajar.php?id=<?php echo $row['username']; ?>"> 
	<?php echo $row['name']; ?> </a> <?php 
					echo "</td>";
					echo "<td bgcolor=cccccc>";
					echo $row['intake'];
					echo "</td>";
					echo "<td bgcolor=cccccc>";
					echo $row['major'];
					echo "</td>";
					echo "<td bgcolor=cccccc>";
					echo $row['elektif'];
					echo "</td>";
					echo "<td bgcolor=cccccc>";
					echo $row['sekolah'];
					echo "</td>";
					echo "<td bgcolor=000066>";
?>  <a href="pensyarah_RPHpelajar.php?id=<?php echo $row['username']; ?>"> 
					<font color="FFFFFF">RPH PELAJAR </font></a> 
					<?php echo "</td>";
					echo "<td bgcolor=000066>";
?>  <a href="pensyarah_RPHpensyarah.php?id=<?php echo $row['username']; ?>"> 
				<font color="FFFFFF">KOMEN PENSYARAH </font></a> 
				<?php echo "</td>";
					echo "</tr>";
					}
				}
						$result->close();
			}
										
	$link->close();
?>
<br>
</td></tr></table>	
	<br><br>
</fieldset>
<?php 
}
include('include/footer.php');?>