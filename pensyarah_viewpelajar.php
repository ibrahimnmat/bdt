<?php
	include('include/header.php');	
	if(!isset($_SESSION['USERID'])){
	header("Location:index.php");
	exit;
	}

	if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']!="pensyarah"){	
	echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
	}
else {
	require_once('include/mysql_connect.php');
	$id=$_REQUEST['id'];
	$sql="select * from pelajar where username='$id'";
	
	$result = $link->query($sql);
	$row = mysqli_fetch_array($result);
	?>

<fieldset><legend><b> Maklumat Pelajar </b></legend>
<br />
        <table width="100%" align=center border=2 bgColor=#f7f4dc>
		  
          <tr> 
            <td width="35%"><b>Nama</b> 
           <td width="65%"> 
               <?php echo $row['name'] ?>   </td>
          </tr><tr> 
            <td width="35%"><b>Nombor Kad Pengenalan</b></td>
            <td width="65%"> 
             <?php echo $row['icno'] ?>    </td>
          </tr>
          <tr> 
            <td width="35%"><b>Ambilan</b></td>
            <td width="65%"> 
             <?php echo $row['intake'] ?>    </td>
          </tr>
	  <tr> 
            <td width="35%" ><b>Pengkhususan</b></td>
   <td width="65%"> 
               <?php echo $row['major'] ?>   </td>
          </tr>
          <tr> 
            <td width="35%" ><b>Elektif</b></td>
   <td width="65%"> 
               <?php echo $row['elektif'] ?>   </td>
          </tr>
          <tr> 
            <td width="35%"><b>Nombor Telefon </b></td>
            <td width="65%"> 
              <?php echo $row['contact'] ?>            </td>
          </tr>
          <tr> 
            <td width="35%"><b>Emel</b></td>
            <td width="65%"> 
              <?php echo $row['email'] ?>            </td>
          </tr>
                <tr> 
            <td width="35%"><b>Sekolah Praktikum</b></td>
            <td width="65%"> 
              <?php echo $row['sekolah'] ?>            </td>
          </tr>
                <tr> 
            <td width="35%"><b>Guru Pembimbing</b></td>
            <td width="65%"> 
              <?php echo $row['gurubimbing'] ?>            </td>
          </tr>
                <tr> 
            <td width="35%"><b>Tempoh Praktikum</b></td>
            <td width="65%"> 
              <?php echo $row['tempoh'] ?>            </td>
          </tr>
       
          <td colspan=2 align=center >
            <br> 
              <input type=button value="KEMBALI" onclick="javascript:history.go(-1)" class=button>
            <p><br>	</p></td> 
        </table></fieldset>
<?php 
}
include('include/footer.php');?>