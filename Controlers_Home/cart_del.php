<?php
//session_start();
//$cart=$_SESSION['cart'];
$id=$_GET['item'];
if($id == 0)
{
	unset($_SESSION['cart']);
}
else
{
unset($_SESSION['cart'][$id]);
}
header("location:index.php?module=giohang");
?>

