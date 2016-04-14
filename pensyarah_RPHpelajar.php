<?php
	include('include/header.php');
	if(!isset($_SESSION['USERID'])){
	header("Location:index.php");
	exit;
}
else {
	require_once('include/mysql_connect.php');
	$id=$_REQUEST['id'];
	$pelajar="Select name from pelajar where username='$id'";
	$resultpelajar=$link->query($pelajar)or die('Error, insert query failed');
	$rowpelajar = mysqli_fetch_array($resultpelajar);
	$id2=$_SESSION['USERID'];
	$pensyarah="Select name from pensyarah where username='$id2'";
	$resultpensyarah=$link->query($pensyarah)or die('Error, insert query failed');
	$rowpensyarah = mysqli_fetch_array($resultpensyarah);
	$namapensyarah=$rowpensyarah['name']; 
	$first = TRUE;
	?>
    <fieldset><legend><strong>RPH BAGI <?php echo $rowpelajar['name'] ?></strong><i>&nbsp;(Sila Klik Pada Nama Fail Untuk Muat Turun)</i></legend>
    <?php
	$query = "SELECT upload_id, file_name, ROUND(file_size/1024) As fs, Date_FORMAT(date_entered, '%M %e, %Y')As d, description FROM 		              uploads where file_who='$id' AND pensyarah='$namapensyarah' AND file_comment IS NULL ORDER BY date_entered DESC";
		$result=$link->query($query)or die('Error, insert query failed');
	
	//Display files
	while($row = mysqli_fetch_array($result)){
		//first record create table
		if($first){
			echo '<table border="1" width="100%" cellspacing="3" cellpadding="3" align="center">
		<tr>
			<td align="left" bgcolor="FFFFFF"><strong>Nama Fail</strong></td>
			<td align="left" bgcolor="FFFFFF"><strong>Keterangan</strong></td>
			<td align="left" bgcolor="FFFFFF"><strong>Tarikh Dihantar</strong></td>
			<td align="center" bgcolor="FFFFFF"><strong>Saiz</strong></td>
		</tr>';
		
			$first=FALSE;
		}
		echo "<tr>
			<td align=\"left\"><a href=\"RPHdownload_file.php?uid={$row['upload_id']}\">{$row['file_name']}</a></td>
			<td align=\"left\">" . stripslashes($row['description']) . "</td>
			<td align=\"left\">" . stripslashes($row['d']) . "</td>
			<td align=\"center\">{$row['fs']}kb</td>";
							echo "<td bgcolor=000066>";
?>  <a href="pensyarah_RPHkomen.php?id=<?php echo $id; ?>"> 
			<font color="FFFFFF">KOMEN </font></a> 
			<?php echo "</td>";
		echo "</tr>\n";
	}
	if($first){
	echo '<br><div align="center"><font color=RED> <strong>Minta Maaf, Tiada RPH Yang Dihantar Setakat Ini</strong></font></div>';
	}else{
		echo '</table>';
	}
}?> </fieldset><?php
include('include/footer.php');
?>