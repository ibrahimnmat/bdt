<?php
	include('include/header.php');	
	if(!isset($_SESSION['USERID'])){
	header("Location:index.php");
	exit;
	}

	if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']!="pelajar"){	
	echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
	}
else {
	require_once('include/mysql_connect.php');
	$id=$_SESSION['USERID'];
	$sql="select * from pelajar where username='$id'";
	
	$result = $link->query($sql);
	$row = mysqli_fetch_array($result);
	?>

<fieldset><legend><b> Maklumat Penempatan </b></legend>
<br />
        <table width="100%" align=center border=2 bgColor=#f7f4dc>
		  
          <tr> 
            <td width="35%"><b>Sekolah Penempatan</b> 
           <td width="65%"> 
               <?php echo $row['sekolah'] ?>   </td>
          </tr><tr> 
            <td width="35%"><b>Pensyarah Penyelia (Pengkhususan)</b></td>
            <td width="65%"> 
             <a href="pelajar_viewlecturer.php?id=<?php echo $row['pensyarah']; ?>"> <?php echo $row['pensyarah'] ?>  </a>  </td>
          </tr>
          <tr> 
            <td width="35%"><b>Pensyarah Penyelia (Elektif)</b></td>
            <td width="65%"> 
             <a href="pelajar_viewlecturer.php?id=<?php echo $row['pensyarah2']; ?>"> <?php echo $row['pensyarah2'] ?>  </a>  </td>
          </tr>
          <tr> 
            <td width="35%"><b>Guru Bimbingan</b></td>
            <td width="65%"> 
             <?php echo $row['gurubimbing'] ?>    </td>
          </tr>
	  <tr> 
            <td width="35%" ><b>Tempoh</b></td>
   <td width="65%"> 
               <?php echo $row['tempoh'] ?>   </td>
          </tr>
       
          <td colspan=2 align=center >
            <br> 
              
            </td> 
        </table></fieldset>
<?php 
}
include('include/footer.php');?>