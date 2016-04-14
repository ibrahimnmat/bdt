<?php
	include('include/header.php');
	if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

else {
	require_once('include/mysql_connect.php');
	$who=$_SESSION['USERID'];
	
	$major="Select major from pelajar where username='$who'";
	$resultmajor=$link->query($major)or die('Error, insert query failed');
	$rowmajor = mysqli_fetch_array($resultmajor);
	$rmajor=$rowmajor['major'];
	
	$minor="Select elektif from pelajar where username='$who'";
	$resultminor=$link->query($minor)or die('Error, insert query failed');
	$rowminor = mysqli_fetch_array($resultminor);
	$rminor=$rowminor['elektif'];
	
	$intake="Select intake from pelajar where username='$who'";
	$resultintake=$link->query($intake)or die('Error, insert query failed');
	$rowintake = mysqli_fetch_array($resultintake);
	$rintake=$rowintake['intake'];
	
	
	$same="Select * from pelajar where intake='$rintake' AND major='$rmajor' AND elektif='$rminor' AND username!='$who'";
	$resultsame=$link->query($same)or die('Error, insert query failed');


	$first = TRUE;
	?>
    <fieldset><legend><strong>RPH RAKAN LAIN YANG TELAH DISEMAK</strong><i>&nbsp;(Sila Klik Pada Nama Fail Untuk Muat Turun)</i></legend>
    <?php
	
	while($rowsame=mysqli_fetch_array($resultsame))
	{
		$rsame=$rowsame['name'];
	$query = "SELECT upload_id, file_name, ROUND(file_size/1024) As fs, file_comment, file_who, Date_FORMAT(date_entered, '%M %e, %Y') As d, description FROM uploads where file_who='$rsame' AND file_comment IS NOT NULL ORDER BY date_entered DESC";
		$result=$link->query($query)or die('Error, insert query failed');
	
	//Display files
	while($row = mysqli_fetch_array($result)){
		//first record create table
		if($first){
			echo '<table border="1" width="100%" cellspacing="3" cellpadding="3" align="center">
		<tr>
			<td align="left" bgcolor="FFFFFF"><strong>Nama Fail</strong></td>
			<td align="left" bgcolor="FFFFFF"><strong>Keterangan</strong></td>
			<td align="left" bgcolor="FFFFFF"><strong>Dihantar Oleh</strong></td>
			<td align="left" bgcolor="FFFFFF"><strong>Dihantar Kepada</strong></td>
			<td align="left" bgcolor="FFFFFF"><strong>Tarikh Dihantar</strong></td>
			<td align="center" bgcolor="FFFFFF"><strong>Saiz</strong></td>
		</tr>';
		
			$first=FALSE;
		}
		echo "<tr>
			<td align=\"left\"><a href=\"RPHdownload_file.php?uid={$row['upload_id']}\">{$row['file_name']}</a></td>
			<td align=\"left\">" . stripslashes($row['description']) . "</td>
			<td align=\"left\">" . stripslashes($row['file_comment']) . "</td>
			<td align=\"left\">" . stripslashes($row['file_who']) . "</td>
			<td align=\"left\">" . stripslashes($row['d']) . "</td>
			<td align=\"center\">{$row['fs']}kb</td>";
		echo "</tr>\n";
	}}
	if($first){
	echo '<br><div align="center"><font color=RED> <strong>Minta Maaf, Tiada RPH Yang Dihantar Oleh Pensyarah Setakat Ini</strong></font></div>';
	}else{
		echo '</table>';
	}
}?> </fieldset><?php
include('include/footer.php');
?>		