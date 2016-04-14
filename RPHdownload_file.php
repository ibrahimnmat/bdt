<?php
include('include/header.php');
if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}
	
	if(isset($_GET['uid'])){
		$uid = (int) $_GET['uid'];
	}else{
		$uid = 0;
	}
	
	if($uid>0){//an id is received
		require_once('include/mysql_connect.php');
		//get file information from database
		$query = "SELECT file_name,file_type,file_size FROM uploads WHERE upload_id=$uid";
		$result=$link->query($query)or die('Error, insert query failed');
		list($fn, $ft, $fs) = mysqli_fetch_array($result);

		$uploaddir = 'uploads/RPH/';
		$the_file = $uploaddir.$uid;
		
		//check file existance
		if(file_exists($the_file)){
		 	chmod($the_file, 0750);
			header("Content-Type: $ft\n");
			header("Content-disposition: attachment; filename=\"$fn\"\n");
			header("Content-Transfer-Encoding: binary"); 
			header("Content-Length: $fs\n");
			ob_clean();
    		flush();
			readfile($the_file);
		}else{
			echo '<p><font color="red">The file could not be located on the server.
			We apologize for any inconvenience.</font></p>';
			include('include/footer.php');
		}
	}else{
		echo '<p><font color="red">Please select a valid file to download</font></p>';
		include('include/footer.php');
	}
?>