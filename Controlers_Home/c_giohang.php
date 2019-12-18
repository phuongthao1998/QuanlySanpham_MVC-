<?php
$cmd ="";
if(isset($_REQUEST["cmd"]))
	$cmd = $_REQUEST["cmd"];
//print_r($_SESSION['cart']);
switch($cmd)
{
	case "add":
		require("Controlers_home/cart_add.php");
		break;
	case "update":
		require("Controlers_home/cart_update.php");
		break;
	case "del":
		require("Controlers_home/cart_del.php");
		break;
	default:
		require("Controlers_home/cart.php");
		break;	
}
?>