<?php
//session_start();
if(isset($_SESSION["login"])==FALSE ||$_SESSION["login"]=="")
{
	echo "<H3> Bạn chưa đăng nhập</H3>";
	echo "<a href='Login.php'> Mời đăng nhập </a>";
	die();
}
?>