<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
?>
<html>
	<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
	<title>Sistem BDT IPG Kampus Rajang : Daftar Masuk</title>
	<script language="JavaScript"  charset="utf-8">
	function loginCheck(){
		var tmpID = document.formLogin.userID.value;
		var tmpPW = document.formLogin.passwd.value;
		var returnVar = true;
			  
		if(tmpID.length == 0 || tmpPW.length == 0)
			returnVar = false;
			return returnVar;
			}
	</script>
	</head>
	<body bgcolor="#CC6600" text="#FFFFFF">
<?php 
include 'include/mysql_connect.php';
		if($_REQUEST['submit_login']=="Daftar Masuk"){
			 $userID = $_REQUEST['userID'];
			 $passwd = md5($_REQUEST['passwd']);
			  
		if(trim($userID)<>"")
			$_SESSION['USERID'] = $userID;
			$query	= "SELECT * FROM user WHERE username = '$userID' and password = '$passwd'";
			  	
		if ($result = $link->query($query)){
		  	$num = $result->num_rows;
		  		 	
		if($num>0){
			 $row = mysqli_fetch_array($result);
				$_SESSION['ACCTYPE']=$row['usertype']; 
				$_SESSION['USERID']=$row['username'];
				include 'in_status.php';
				echo "<script language='javascript'>";
				if ($_SESSION['ACCTYPE']=="admin")
				{
		    	echo "window.location='daftarpelajar.php'";
			   	}
				if ($_SESSION['ACCTYPE']=="pegdata")
				{
		    	echo "window.location='daftarpelajar.php'";
			   	}
				if ($_SESSION['ACCTYPE']=="pensyarah")
				{
		    	echo "window.location='pensyarah_personalia.php'";
			    }
				if ($_SESSION['ACCTYPE']=="pelajar")
				{
		    	echo "window.location='pelajar_personalia.php'";
			    }	
				echo "</script>";
				}
					else
			    		if($_SESSION['USERID']<>"NULL")
				  			$warn = true;
					$result->close();
				}
			}
?>
		<div align="center">
		<img src="images/BDT.png"> 
		 <p>
          <strong><font color="#ffffff">SISTEM BIMBINGAN DALAM TALIAN </font></strong><br>
			<br><font size="-1">
			 INSTITUT PENDIDIKAN GURU KAMPUS RAJANG <br>	
             JALAN KJD, 96509 BINTANGOR, SARAWAK. <br>
             NO. TEL: 084-691910 &nbsp; NO. FAKS: 084-691913 <br>
             LAMAN WEB: &nbsp;<a href="http://www.ipgkrajang.edu.my" target="_blank"><strong><font color="#FFFFFF">http://www.ipgkrajang.edu.my </font></strong></a>
         </font></p>
	</div> <br>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr>  <td width="35%"><div align="right"><img src="images/login.gif"></div></td>
      <td width="75%"><div align="left">
      &nbsp;&nbsp; Sila masukkan ID Pengguna dan Kata Laluan anda 
       </div></td> </tr> </table>
<form name="login" method="POST" action="index.php" onSubmit="return loginCheck()">
 <table align="center" border="0">
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td width="100">ID Pengguna</td>
		<td align="right">
	<?php
			$tmpID = "";
			if($_SESSION['USERID']<>"NULL")
				$tmpID = $_SESSION['USERID'];
		echo "<input type='text' name='userID' maxlength='20' style='width:15em' value='",$tmpID,"'>";
	?>
</td></tr>
		<tr> <td width="100">Kata Laluan</td>
			<td align="right">
		<input type="password" name="passwd" style="width:15em" maxlength="20" >
			</td></tr>
			<tr><td>&nbsp </td></tr>
			<tr> <td width="80">&nbsp; </td>					
			<td align="right">
		<input type="submit" name="submit_login" value="Daftar Masuk">
			</td></tr>
				<tr>
				<td>&nbsp;</td>
				<td align="right">
<?php
			if($warn == true){
			echo "<font size='2' color='FF6666'>";
			echo "<i>ID Pengguna dan Kata Laluan<br>";
			echo "Tidak Sah.</i>";
			echo "</font>";
			}
?>
		</td></tr></table> </form>
</body>	
</html>