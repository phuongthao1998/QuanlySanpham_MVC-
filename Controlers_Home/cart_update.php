<?php
//session_start();
if(isset($_POST['capnhat']))
{
	foreach($_POST['qty'] as $id=>$qty)
	{
		if( ($qty == 0) and (is_numeric($qty)))
		{
			unset ($_SESSION['cart'][$id]);
		}
		elseif(($qty > 0) and (is_numeric($qty)))
		{
			$_SESSION['cart'][$id]=$qty;
		}
	}
}
header("location:index.php?module=giohang");
?>