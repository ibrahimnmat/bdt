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
	$id=$_REQUEST['id'];
	$sql="select * from pensyarah where name='$id'";
	
	$result = $link->query($sql);
	$row = mysqli_fetch_array($result);
	?>

<fieldset><legend><b> Maklumat Pensyarah </b></legend>
<br />
        <table width="100%" align=center border=2 bgColor=#f7f4dc>
		  
          <tr> 
            <td width="35%"><b>Nama Pensyarah</b> 
           <td width="65%"> 
               <?php echo $row['name'] ?>   </td>
          </tr><tr> 
            <td width="35%"><b>Jawatan</b></td>
            <td width="65%"> 
              <?php echo $row['position'] ?>  </td>
          </tr>
          <tr> 
            <td width="35%"><b>Jabatan</b></td>
            <td width="65%"> 
             <?php echo $row['department'] ?>    </td>
          </tr>
	  <tr> 
            <td width="35%" ><b>Nombor Telefon</b></td>
   <td width="65%"> 
               <?php echo $row['contact'] ?>   </td>
          </tr>
         	  <tr> 
            <td width="35%" ><b>Emel</b></td>
   <td width="65%"> 
               <?php echo $row['email'] ?>   </td>
          </tr>
          <td colspan=2 align=center >
            <br> 
              <input type=button value="KEMBALI" onclick="javascript:history.go(-1)" class=button />
            </td> 
        </table></fieldset>
<?php 
}
include('include/footer.php');?>