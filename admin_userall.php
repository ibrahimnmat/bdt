<?php
include('include/header.php');
if(!isset($_SESSION['USERID'])){
header("Location:index.php");
}
if(isset($_SESSION['ACCTYPE'])&& ($_SESSION['ACCTYPE']!="admin" && $_SESSION['ACCTYPE']!="pegdata")){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
}
else {
?> <fieldset><legend><strong>Maklumat Pengguna Sistem</strong></legend>
<table align="center">
	<tr>
		<td>
	Bilangan Dalam Muka Surat : &nbsp
<?php
	require_once('include/mysql_connect.php'); 
		$query 		= "SELECT COUNT(*) AS rowNo FROM user;";
		$rowData 	= 0;
	if ($result = $link->query($query)){
		$num   = $result->num_rows;
	if($num>0){
		$row = mysqli_fetch_array($result);
		$rowData = $row['rowNo']-1;
		}
		}
		echo "<a href=admin_userall.php?limit=all&order=".$_REQUEST['order']."&page=1>Semua</a>";
		echo "&nbsp&nbsp&nbsp";
		echo "<a href=admin_userall.php?limit=10&order=".$_REQUEST['order']."&page=1>10</a>";
		echo "&nbsp&nbsp&nbsp";
		echo "<a href=admin_userall.php?limit=20&order=".$_REQUEST['order']."&page=1>20</a>";
		echo "&nbsp&nbsp&nbsp";
		echo "<a href=admin_userall.php?limit=50&order=".$_REQUEST['order']."&page=1>50</a>";
		echo "&nbsp&nbsp&nbsp";
		?>
		</td>
		</tr></table><br />
        <table align="center" border="1"  id="headerNav4">
        <tr>
		<?php
			$hyperlink1 = "<a href='admin_userall.php?limit=".$_REQUEST['limit'];
			$hyperlink1 = $hyperlink1."&order=";
			$hyperlink2 = "&page=".$_REQUEST['page']."' onMouseOver="."this.style.textDecoration='none';".
			" onMouseOut="."this.style.textDecoration='underline';"." title='Disusun dengan";
			echo "<td bgcolor=black align=center>";
			echo "<font color='white' face='verdana'>";
			echo "NO.</font></td>";
			echo "<td bgcolor=black align=center>";
			echo $hyperlink1."username".$hyperlink2." ID Pengguna'>";
			echo "<font color='white' face='verdana'>";
			echo "ID PENGGUNA</font></a></td>";
			echo "<td bgcolor=black align=center>";
			echo $hyperlink1."name".$hyperlink2." Nama Pengguna'>";
			echo "<font color='white' face='verdana'>";
			echo "NAMA PENGGUNA</font></a></td>";
			echo "<td bgcolor=black align=center>";
			echo $hyperlink1."usertype".$hyperlink2." Kategori Pengguna'>";
			echo "<font color='white' face='verdana'>";
			echo "KATEGORI</font></a></td>";
			echo "<td bgcolor=black align=center>";
			echo $hyperlink1."lastvisitDate".$hyperlink2." Lawatan Terakhir'>";
			echo "<font color='white' face='verdana'>";
			echo "LAWATAN TERAKHIR</font></a></td>";
			echo "<td bgcolor=black align=center>";
			echo "<font color='white' face='verdana'>";
			echo "BIL. PENGHANTARAN RPH</font></a></td>";
?>
		</tr>
<?php
		$query = "SELECT * FROM user where username!='admin'";
			if($_REQUEST['order']=="username"){
			$query = $query." ORDER BY username";
		}
			if($_REQUEST['order']=="name"){
			$query = $query." ORDER BY name";
		}
	if($_REQUEST['order']=="usertype"){
	$query = $query." ORDER BY usertype";
									 }
	if($_REQUEST['order']=="lastvisitDate"){
$query = $query." ORDER BY lastvisitDate DESC";
											}
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
		$rowNo = 0;
		if($_REQUEST['limit']>0){
		$rowNo = ($_REQUEST['limit']*($_REQUEST['page']-1));
											}
			if($num>0){
			while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td bgcolor=cccccc align=center>";
			echo (++$rowNo).".";
			echo "</td>";
			echo "<td bgcolor=cccccc align=center>"; ?>
       <a href="admin_resetpwd.php?id=<?php echo $row['username'];?>"> <?php echo $row['username']; ?> </a> <?php
			echo "</td>";		
			
			$usertype=$row['usertype'];
			$username=$row['username'];
			$name=$row['name'];
			
			if($usertype=='pelajar'){									
					echo "<td bgcolor=cccccc>"; ?>
       <a href="admin_pelajarkemaskini.php?id=<?php echo $row['username'];?>"><?php echo $row['name']; ?></a>
			<?php
			echo "</td>";}
			else 
			{
			echo "<td bgcolor=cccccc>"; 
      		echo $row['name']; 
			echo "</td>";
			}
			echo "<td bgcolor=cccccc align=center>";
			echo $row['usertype'];
			echo "</td>";
			echo "<td bgcolor=cccccc>";
			echo $row['lastvisitDate'];
			echo "</td>";
			
		if($usertype=='pelajar'){									
			$sqlcs="select count(*) As CS from uploads where file_who='$username' and file_comment is NULL";
			$resultcs = $link->query($sqlcs);
			$rowcs = mysqli_fetch_array($resultcs);
		echo "<td bgcolor=blue align=center>"; ?>
       <a href="admin_RPHpelajar.php?id=<?php echo $username;?>&name=<?php echo $name;?>"> <font color=white><?php echo $rowcs['CS']; ?></font> </a> <?php
		echo "</td>";
		}
		else
		{
		if($usertype=='pensyarah'){									
		$sqlcl="select count(*) As CL from uploads where file_comment='$username'";
		$resultcl = $link->query($sqlcl);
		$rowcl = mysqli_fetch_array($resultcl);
		echo "<td bgcolor=blue align=center>"; ?>
         <a href="admin_RPHpensyarah.php?id=<?php echo $username;?>&name=<?php echo $name;?>"> <font color=white><?php echo $rowcl['CL']; ?></font> </a> <?php
		echo "</td>";
		}
		else
		{
		echo "<td bgcolor=blue align=center>";
		echo "<font color=white><b> - </b></font>";
		echo "</td>";
		}
		}
		if($usertype=='pelajar')
		{
		echo "<td bgcolor=RED>"; ?>
<a href="admin_pelajardelete.php?id=<?php echo $row['username']; ?>" onclick="return confirm('Adakah Anda Pasti Untuk Padam Pengguna ini?')"> <font color=white><strong>PADAM</strong></font> </a> <?php
		echo "</td>";
		}
		else{
		if($usertype=='pensyarah')
		{
		echo "<td bgcolor=RED>"; ?>
 <a href="admin_pensyarahdelete.php?id=<?php echo $row['username']; ?>" onclick="return confirm('Adakah Anda Pasti Untuk Padam Pengguna ini?')"> <font color=white><strong>PADAM</strong></font> </a> <?php
		echo "</td>";
		}
		else
		{
		echo "<td bgcolor=RED>"; ?>
        <a href="admin_userdelete.php?id=<?php echo $row['username']; ?>" onclick="return confirm('Adakah Anda Pasti Untuk Padam Pengguna ini?')"> <font color=white><strong>PADAM</strong></font> </a> <?php
		echo "</td>";
		}
		}
		echo "</tr>";
		}
		}
		$result->close();
		}
		$link->close();
?>
		</table>		<br> <div align="center">  Muka Surat :
<?php
		if($_REQUEST['limit']>0)
		$limit = $_REQUEST['limit'];
			else
				$limit = $rowData;
												
		if($_REQUEST['page']>2)
			$prev = $_REQUEST['page'] - 1;
			else
				$prev = 1;
				echo "<a href='admin_userall.php?limit=".$_REQUEST['limit'].
				 "&order=".$_REQUEST['order']."&page=".$prev
				 ."'>Sebelum</a>";
				echo "&nbsp&nbsp&nbsp";
				$int_i=1;	 													
		for(; $int_i<=ceil($rowData/$limit); $int_i++){
			echo "<a href='admin_userall.php?limit=".$_REQUEST['limit'].
				 "&order=".$_REQUEST['order']."&page=".$int_i
				 ."'>".$int_i."</a>";
			echo "&nbsp&nbsp&nbsp";
				if($int_i%25==0)
			echo "<br>";
				}
										
	if($_REQUEST['page']+1<$int_i)
			$next = $_REQUEST['page'] + 1;
		else
			$next = $_REQUEST['page'];
		echo "<a href='admin_userall.php?limit=".$_REQUEST['limit'].
			 "&order=".$_REQUEST['order']."&page=".$next
			 ."'>Seterusnya</a>";
?>
</div>
</fieldset>
<?php 
}
include('include/footer.php');?>