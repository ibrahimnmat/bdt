<?php		
		$link = new mysqli("localhost", "root", "mysql", "bdt");
			if (mysqli_connect_errno()) {
   				printf("Connect failed: %s\n", mysqli_connect_error());
   				exit();
			}
			
function escape_data($data) {
global $link;
if (ini_get('magic_quotes_gpc')) {
$data = stripslashes($data);
}
return mysqli_real_escape_string($link, trim($data));
}
	?>