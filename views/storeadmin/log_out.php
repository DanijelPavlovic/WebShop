<?php
	session_start();
	
	
	
	//if(setcookie('username', $_SESSION['manager'], time()-7*24*60*60, '/')) echo "Cookie uni�ten";
	
	session_destroy();
	header('Location: admin_login.php?odjava=true');
?>