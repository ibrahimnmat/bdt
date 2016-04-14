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
	$id=$_SESSION['USERID'];
	$sql="select * from pensyarah, user where user.username='$id' AND user.username=pensyarah.username";
	
	$result = $link->query($sql);
	$row = mysqli_fetch_array($result);
	?>

<fieldset><legend><b> Maklumat Pensyarah </b></legend>
<br />
        <table width="100%" align=center border=2 bgColor=#f7f4dc>
		  
          <tr> 
            <td width="35%"><b>Nama</b> 
           <td width="65%"> 
               <?php echo $row['name'] ?>   </td>
          </tr><tr> 
            <td width="35%"><b>Jawatan</b></td>
            <td width="65%"> 
             <?php echo $row['position'] ?>    </td>
          </tr>
	  <tr> 
            <td width="35%" ><b>Jabatan</b></td>
   <td width="65%"> 
               <?php echo $row['department'] ?>   </td>
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
       
          <td colspan=2 align=center >
            <br> 
            <input type=button onClick="javascript:window.open('pensyarah_editinfo.php','_self')" value="KEMASKINI MAKLUMAT" name="button">
              
            <p><br>	</p></td> 
        </table></fieldset>
<?php 
}

include('include/footer.php');?>