<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	$_SESSION["user"]="";
	unset($_SESSION);
	session_destroy();
	echo "<script language='javascript'>";
	echo "window.location.href='backlogin.php' ";
	echo "</script>";
?>