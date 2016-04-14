<?php
include('include/header.php');
if(!isset($_SESSION['USERID'])){

header("Location:index.php");
exit;
}

else {
	if(isset($_GET['uid'])){
		$uid=(int)$_GET['uid'];
	}elseif (isset($_POST['uid'])){
		$uid=(int)$_POST['uid'];
	}else{
		$uid=0;
	}
	
	$checksql="select * from uploads where upload_id=$uid";
	$checkresult=$link->query($checksql);
	$rowcheck = mysqli_fetch_array($checkresult);
	$verify=$rowcheck['file_who'];
	$userid=$_SESSION['USERID'];
	
	if($uid <= 0 || ($verify != $userid)){
	
echo "<p><font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font></p>";
		include('include/footer.php');
		exit();
	}
		
	require_once('include/mysql_connect.php');
	
	if(isset($_POST['submitted'])){//Delete files
			$query = "DELETE FROM uploads WHERE upload_id=$uid";
			$link->query($query);
			$affect = mysqli_affected_rows($link);
			
			unlink("uploads/RPH/$uid");
			
			if($affect>0){
				echo '<p><b>FAIL RPH INI TELAH DIPADAM!</b></p>';
				echo "<div align=\"center\"><a href=\"RPHview_file.php\"><input type=\"submit\" value=\"KEMBALI\"></div>";
			}else{
				echo '<p><font color ="red">Permintaan anda tidak dapat diproses kerana masalah sistem.
				Kami minta maaf di atas segala kesulitan.</font></p>';
			}
			
			include('include/footer.php');
			exit();
	}//end isset($file)		
	
	$query = "SELECT file_name, file_size, description, pensyarah,Date_FORMAT(date_entered, '%M %e, %Y') FROM uploads WHERE upload_id=$uid";
	$result = $link->query($query);
	
	list($fn,$fs,$d,$l,$date) = mysqli_fetch_array($result,MYSQL_NUM);
	?>
		<fieldset><legend><strong>PADAM RPH FAIL </strong></legend>
<form action="RPH_delete.php" method="post">

	
	<input type="hidden" name= "submitted" value="TRUE" /><br>
   
    <table width="100%" align=center border=2 bgColor=#f7f4dc>
		  
          <tr> 
            <td width="35%"><b>Nama Fail</b> 
           <td width="65%"> 
               <?php echo $fn; ?>   </td>
          </tr><tr> 
            <td width="35%"><b>Keterangan</b></td>
            <td width="65%"> 
             <?php echo $d; ?>    </td>
          </tr><tr> 
            <td width="35%"><b>Dihantar Kepada</b></td>
            <td width="65%"> 
             <?php echo $l; ?>    </td>
          </tr><tr> 
            <td width="35%"><b>Tarikh Dihantar</b></td>
            <td width="65%"> 
             <?php echo $date; ?>    </td>
          </tr>
          <tr> 
            <td width="35%"><b>Saiz Fail (bytes)</b></td>
            <td width="65%"> 
             <?php echo $fs; ?>    </td>
          </tr>
	  <?php echo '<input type="hidden" name="uid" value="' . $uid . '"/>'; ?>
          <td colspan=2 align=center >
            <br> 
	<div align="center"><input type="submit" name="submit" value="PADAM"  onclick="return confirm('Adakah Anda Pasti Untuk Padam Rekod ini?')"></div>
            <br></td> </table> </form> 
        </fieldset>

	<?php
	}
include('include/footer.php');
	?>