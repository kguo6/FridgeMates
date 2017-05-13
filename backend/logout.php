<?php
	session_start();
	
	unset($_SESSION['USER_ID']);
	unset($_SESSION['USER_NAME']);
	session_write_close();
	header("location: index.php");
	exit();
?>
