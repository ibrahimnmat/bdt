<?php
	include('include/header.php');
	if(!isset($_SESSION['USERID'])){
	header("Location:index.php");
	exit;
}

else {
	require_once('include/mysql_connect.php');
	$who=$_SESSION['USERID'];
	$first = TRUE;
	?>
    <fieldset><legend><strong>RPH SAYA</strong><i>&nbsp;(Sila Klik Pada Nama Fail Untuk Muat Turun)</i></legend>
    <br />
    <?php
	$query = "SELECT upload_id, file_name, ROUND(file_size/1024) As fs, description, pensyarah, Date_FORMAT(date_entered, '%M %e, %Y') 		    As d FROM uploads where file_who='$who' AND file_comment IS NULL ORDER BY date_entered DESC";
		$result=$link->query($query)or die('Error, insert query failed');
	
	//Display files
	while($row = mysqli_fetch_array($result)){
		//first record create table
		if($first){
			echo '<table border="1" width="100%" cellspacing="3" cellpadding="3" align="center">
		<tr>
			<td align="left" bgcolor="FFFFFF"><strong>Nama Fail</strong></td>
			<td align="left" bgcolor="FFFFFF"><strong>Keterangan</strong></td>
			<td align="left" bgcolor="FFFFFF"><strong>Dihantar kepada</strong></td>
			<td align="left" bgcolor="FFFFFF"><strong>Tarikh Dihantar</strong></td>
			<td align="center" bgcolor="FFFFFF"><strong>Saiz</strong></td>
		</tr>';
		
			$first=FALSE;
		}
		echo "<tr>
			<td align=\"left\"><a href=\"RPHdownload_file.php?uid={$row['upload_id']}\">{$row['file_name']}</a></td>
			<td align=\"left\">" . stripslashes($row['description']) . "</td>
			<td align=\"left\">" . stripslashes($row['pensyarah']) . "</td>
			<td align=\"left\">" . stripslashes($row['d']) . "</td>
			<td align=\"center\">{$row['fs']}kb</td>
			<td align=\"center\" bgcolor=\"RED\"><a href=\"RPH_delete.php?uid={$row['upload_id']}\"><font color=yellow><strong>PADAM</strong><font></a></td>";
		echo "</td>";
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