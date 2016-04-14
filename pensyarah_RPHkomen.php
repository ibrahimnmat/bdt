<?php 
include('include/header.php');

if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

else {
	$counter = 1; //number files allowed
	$who=$_REQUEST['id'];
	$pelajar="Select name from pelajar where username='$who'";
	$resultpelajar=$link->query($pelajar)or die('Error, insert query failed');
	$rowpelajar = mysqli_fetch_array($resultpelajar);
	$namapelajar=$rowpelajar['name'];
	$id=$_SESSION['USERID'];
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
				$query = "INSERT INTO uploads (file_name,file_size,file_type,description,file_who,file_comment) VALUES
  ('{$_FILES[$filename]['name']}',{$_FILES[$filename]['size']},'{$_FILES[$filename]['type']}',$d,'$namapelajar','$id')";
				$result=$link->query($query)or die('Error, insert query failed');
				if($result){//return upload id
					$upload_id = mysqli_insert_id($link);
					$uploaddir = 'uploads/RPH/';
					//move the file
					if(move_uploaded_file($_FILES[$filename]['tmp_name'],$uploaddir.$upload_id)){
                        chmod($uploaddir.$upload_id, 0750);
						echo '<p><font color="blue">Komen pensyarah telah berjaya dihantar!</font></p>';
					}else{//file cannot be moved
						echo '<p><font color="red">KOMEN PENSYARAH GAGAL DIHANTAR!</font></p>';
						
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
<form enctype="multipart/form-data" action="pensyarah_RPHkomen.php?id=<?php echo $who; ?>" method="post">
	<fieldset><legend><strong>Hantar RPH </strong></legend>
	<i><font color="#FF0000">Saiz File TIDAK boleh melebihi 5.0 MB</font></i>
	<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
	<?php
	for($i = 0;$i<$counter;$i++){
		echo '<p><b>File: </b><input type="file" name="upload' . $i . '"/></p>
			  <p><b>Keterangan: </b><input type="text" name="description' . $i . '" size="40" maxlength="35"></textarea></p><br />';
	}
	?> 
	
	</fieldset>
	<input type="hidden" name="submitted" value="TRUE" />
	<div align="center"><input type="submit" name="submit" value="Hantar" /></div>

</form>
<?php
}
include('include/footer.php');
?>