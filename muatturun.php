<?php 
include('include/header.php');

if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}
else {?>
<fieldset><legend><b> Muat Turun Bahan-bahan Praktikum </b></legend>
<br />
        <table width="100%" align=center >
		  
          <tr> 
            <td class="content">
         <p><strong><u>Program Ijazah Sarjana Muda Peguruan (PISMP)</u></strong></b></p>
         <ol><li><a href="download/Garis Panduan Amalan Profesional PISMP Kemas Kini 2014.zip" target="_blank" class="navlink" title="Garis Panduan Amalan Profesional PISMP">Garis Panduan Amalan Profesional PISMP Kemaskini 2014</a></li><li><a href="download/Panduan Penggunaan dan Senarai Borang Praktikum PISMP Edisi 2015.zip"  title="Panduan Penggunaan dan Senarai Borang Praktikum PISMP" target="_blank" class="navlink">Panduan Penggunaan dan Senarai Borang Praktikum PISMP</a></li><li><a href="download/Garis Panduan dan Bahan Pengalaman Berasaskan Sekolah.zip" title="Garis Panduan dan Bahan Pengalaman Berasaskan Sekolah" target="_blank" class="navlink">Garis Panduan dan Bahan Pengalaman Berasaskan Sekolah</a><br></li></ol><div><br></div><p>
         
<strong><u>Program DPLI-SR (j-QAF)</u></strong></p>
<ol>
<li><a title="Garis Panduan MOS DPLI SR j-QAF" href="/download/Garis Panduan MOS DPLI SR j-QAF.pdf" target="_blank" class="navlink">Garis Panduan Minggu Orientasi Sekolah DPLI-SR (j-QAF)</a></li><li><a href="download/Panduan Penggunaan dan Senarai Borang Praktikum DPLI-SR j-QAF.zip" target="_blank" class="navlink">Panduan Penggunaan dan Senarai Borang Praktikum&nbsp;DPLI-SR (j-QAF)</a></li><li><a href="download/Garis Panduan Praktikum DPLI.pdf" target="_blank" class="navlink">Garis Panduan Praktikum DPLI</a><br></li>
</ol><div><br></div><div><p>
<strong><u>Program KDPM-KDC (KEMAS/PERPADUAN)</span></u></strong></p>
<ol>
<li><a title="Garis Panduan Praktikum PLPS KDPM-KDC Kemas" href="download/Garis Panduan Praktikum PLPS KDPM-KDC Kemas.docx" target="_blank" class="navlink">Garis Panduan Praktikum PLPS KDPM-KDC Kemas</a></li>
<li><a title="Semua Borang Praktikum KDPM KDC" href="download/BORANG PRAKTIKUM KDPM KDC.zip" target="_blank" class="navlink">Semua Borang Praktikum KDPM KDC</a></li>
</ol></div><br><br>
         
          </tr>
        </table>
        
        </fieldset>
<?php 
}
include('include/footer.php');?>