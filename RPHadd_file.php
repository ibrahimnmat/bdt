<?php 
include('include/header.php');
if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

else {?>

	<script language=javascript>
	function validate(form)
{
		
if((document.form.app_type[0].checked==false)&&(document.form.app_type[1].checked==false)) 
{ 
alert('Sila pilih hendak hantar ke pensyarah penyelia pengkhususan atau elektif untuk semakan'); 
return false 
}
	}

</script> <?php
	$counter = 1; //number files allowed
	
	if(isset($_POST['submitted'])){
		require_once('include/mysql_connect.php');
		for($i=0;$i<$counter;$i++){
		
			$filename = 'upload' . $i;
			$description = 'description' . $i;
			
			//check for a file
			if(isset($_FILES[$filename])&&($_FILES[$filename]['error'] !=4)){
				if(!empty($_POST[$description])){
					$d= "'" . escape_data($_POST[$description]) . "'";
				}else{
					$d = 'NULL';
				}
		$who=$_SESSION['USERID'];
		$pensyarah=$_POST['app_type'];
				
		$query = "INSERT INTO uploads (file_name,file_size,file_type,description,pensyarah,file_who) VALUES
		('{$_FILES[$filename]['name']}',{$_FILES[$filename]['size']},'{$_FILES[$filename]['type']}',$d,'$pensyarah','$who')";
		$result=$link->query($query)or die('Error, insert query failed');
		if($result){//return upload id
			$upload_id = mysqli_insert_id($link);
			$uploaddir = 'uploads/RPH/';
			//move the file
			if(move_uploaded_file($_FILES[$filename]['tmp_name'],$uploaddir.$upload_id)){
                chmod($uploaddir.$upload_id, 0750);
				echo '<p><font color="blue">RPH telah berjaya dihantar ke ' .$pensyarah. '!</font></p>';
					}else{//file cannot be moved
				echo '<p><font color="red">RPH GAGAL DIHANTAR!</font></p>';
				$query = "DELETE FROM uploads WHERE upload_id = $upload_id";
				$result=$link->query($query)or die('Error, insert query failed');
					}
				}else{
			echo '<p><font color="red">Your Submission could not be processed due to a system error.
					We apologize for any inconvenience.</font></p>';
					//print error 
				}
			}//end isset($file)
		}//end for
	}
?>
<form name=form enctype="multipart/form-data" action="RPHadd_file.php" method="post" onSubmit="return validate(this)">
	<fieldset><legend><strong>Hantar RPH </strong></legend>
	<i><font color="#FF0000">Saiz File TIDAK boleh melebihi 5.0 MB</font></i>
	<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
	<?php
	$who=$_SESSION['USERID'];
	$pensyarah="select pensyarah, pensyarah2 from pelajar where username='$who'";
	$result2=$link->query($pensyarah)or die('Error, insert query failed');
	$rowpensyarah = mysqli_fetch_array($result2);

	for($i = 0;$i<$counter;$i++){
		echo '<p><b>File: </b><input type="file" name="upload' . $i . '"/></p>
			  <p><b>Keterangan: </b><input type="text" name="description' . $i . '" size="40" maxlength="35"></textarea></p>'; ?>
       <b> Hantar Ke Pensyarah </b> <input type=radio name=app_type value= "<?php echo $rowpensyarah['pensyarah'] ?>"  > 
         <?php echo $rowpensyarah['pensyarah'] ?>  <i>(Pengkhususan) </i>
          <input type=radio name=app_type value= "<?php echo $rowpensyarah['pensyarah2'] ?>"  > 
         <?php echo $rowpensyarah['pensyarah2'] ?> <i> (Elektif) </i> <br /><br />
<?php }
	
	?> 
	</fieldset><br />
	<input type="hidden" name="submitted" value="TRUE" />
	<div align="center"><input type="submit" name="submit" value="Hantar" /></div>

</form>
<?php
}
include('include/footer.php');
?>