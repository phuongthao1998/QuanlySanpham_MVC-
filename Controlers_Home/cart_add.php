<?php
//session_start();
$id=$_GET['item'];//lấy mã sản phẩm cần thêm vào giỏ hàng
if(isset($_SESSION['cart'][$id]))//kiểm tra mã sp có trong giỏ hàng chưa?
{
	//3. Nếu id sản phẩm đã có trong giỏ hàng thì số lượng cộng thêm 1 đơn vị
	$qty = $_SESSION['cart'][$id] + 1;
}
else //1.Nếu chưa có
{
	$qty=1;//2. gán số lượng = 1 sản phẩm
}
$_SESSION['cart'][$id]=$qty;//gán số lượng cho giỏ hàng theo key là id của sản phẩm
header("location:index.php?module=giohang");//chuyển tới trang hiển thị giỏ hàng
exit();
?>