<?php
	include('include/header.php');	
	if(!isset($_SESSION['USERID'])){
	header("Location:index.php");
	exit;
	}
	if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']!="pensyarah"){	
	echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
	}
else {?>
<fieldset><legend><b> Manual Pengguna </b></legend>
<br />
        <table width="100%" align=center >
		  
          <tr> 
            <td class="content"><em><font color="#0000CC">Sila klik pada pautan berikut untuk muat turun manual pengguna (Dalam Format .pdf) </font></em>  
            <br /> <br />  <br /> 
            <a href="uploads/manual_pensyarah.pdf" target="_blank" class="navlink"> Manual Pengguna </a> <br /> <br /> <br />
          </tr>
        </table></fieldset>
<?php 
}
include('include/footer.php');?>