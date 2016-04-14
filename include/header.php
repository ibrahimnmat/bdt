<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start(); 
require_once('mysql_connect.php');
?>
<title>Sistem BDT IPG Kampus Rajang</title>
<link rel="stylesheet" type="text/css" href='include/default.css'>
<table width="100%" border="1" cellspacing="5" cellpadding="0" align="center">
	<tr>
	<td>
<img src="images/logo.gif" border="1" height="125" width="100%"> 
</td>
	<td>
		<img src="images/background.jpg" height="125" width="100%" border="1">
	</td>
	</tr>
	<tr><td vallign="top" nowrap="nowrap" width="15%" class="content">
	<font color="#0000CC"> <?php echo "Selamat Datang, <br>",$_SESSION['USERID']; ?></font>
	<br /><br /> 
     <?php  
	 if(isset($_SESSION['ACCTYPE'])&& ($_SESSION['ACCTYPE']=="admin"||$_SESSION['ACCTYPE']=="pegdata")){?> 
	 <a href="daftarpelajar.php" class="navlink"><strong>DAFTAR PELAJAR</strong> </a><br />
	 <a href="daftarpensyarah.php" class="navlink"><strong>DAFTAR PENSYARAH </strong> </a><br /> 
 	<?php }?>
     <?php  if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']=="admin"){?> 
     <a href="admin_daftarpengguna.php" class="navlink"><strong>DAFTAR PENGGUNA LAIN </strong> </a><br />
     <?php }?>
       <?php  if(isset($_SESSION['ACCTYPE'])&& ($_SESSION['ACCTYPE']=="admin"||$_SESSION['ACCTYPE']=="pegdata")){?> 
	 <a href="admin_ambilanall.php?limit=10&page=1" class="navlink"><strong>AMBILAN PELAJAR </strong> </a><br />
	 <a href="admin_kursusall.php?limit=10&page=1" class="navlink"><strong>PENGKHUSUSAN PELAJAR </strong> </a><br /> 
     	 <a href="admin_elektifall.php?limit=10&page=1" class="navlink"><strong>ELEKTIF PELAJAR </strong> </a><br /> 
     <a href="admin_sekolahall.php?limit=10&page=1" class="navlink"><strong>NAMA SEKOLAH PRAKTIKUM </strong> </a><br /> 
     <a href="admin_maklumatpelajar.php" class="navlink"><strong>MAKLUMAT PELAJAR </strong> </a><br /> 
      <a href="admin_userall.php?limit=20&page=1" class="navlink"><strong>MAKLUMAT PENGGUNA SISTEM </strong> </a><br /> 
 	<?php }?>
    <?php  if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']=="pegdata"){?> 
     <a href="pegdata_manual.php" class="navlink"><strong>MANUAL PENGGUNA </strong> </a><br /> 
    <?php }?>
    <?php  if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']=="pensyarah"){?>
     <a href="pensyarah_personalia.php" class="navlink"><strong>MAKLUMAT PENSYARAH </strong> </a><br /> 
     <a href="pensyarah_pelajar.php" class="navlink"><strong>PELAJAR SELIAAN </strong> </a><br /> 
        <a href="pensyarah_manual.php" class="navlink"><strong>MANUAL PENGGUNA </strong> </a><br /> 
     <?php }?>
        <?php  if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']=="pelajar"){?>
     <a href="pelajar_personalia.php" class="navlink"><strong>MAKLUMAT PELAJAR </strong> </a><br /> 
     <a href="pelajar_penempatan.php" class="navlink"><strong>MAKLUMAT PENEMPATAN</strong> </a><br /> 
     <a href="RPHadd_file.php" class="navlink"><strong>HANTAR RPH </strong> </a><br /> 
     <a href="RPHview_file.php" class="navlink"><strong>RPH SAYA </strong> </a><br /> 
     <a href="RPHview_comment.php" class="navlink"><strong>RPH (KOMEN PENSYARAH) </strong> </a><br /> 
  <a href="RPH_all.php" class="navlink"><strong>RPH RAKAN LAIN </strong> </a><br /> 
     <a href="pelajar_manual.php" class="navlink"><strong>MANUAL PENGGUNA </strong> </a><br /> 
     <?php }?>
       <a href="muatturun.php" class="navlink"><strong>MUAT TURUN BAHAN-BAHAN</strong> </a> <br/>
     <a href="chgpwd.php" class="navlink"><strong>TUKAR KATA LALUAN </strong> </a> <br/>
	   </td>
   <td vallign="top" class="content" rowspan="1">