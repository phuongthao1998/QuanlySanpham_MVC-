<?php
require("Models/clsHoadon.php");
require("Models/clsSanpham.php");
require("Models/clsChitietHoadon.php");
$cmd="";
if(isset($_REQUEST["cmd"])==false)
	require("Views_Home/v_thanhtoan_form.php");
else//xử lý thanh toán
{
	echo "<h2> xử lý hóa đơn</h2>";
	$hoten = $_POST["tHoten"];
	$dienthoai = $_POST["tDienthoai"];
	$ngaynhan  = $_POST["tNgaynhan"];
	//tạo hóa đơn mới
	$hoadon = new clsHoadon();
	$hoadon->GanThongtin(NULL,$hoten,$dienthoai,NULL,$ngaynhan,0);
	$ketqua = $hoadon->Them();
	if($ketqua==-1) die ("<p>lỗi csdl</p>");
	$id_hd = $hoadon->lastID;
	//duyệt giỏ hàng và thêm các sản phẩm vào chi tiết hóa đơn
	if(isset($_SESSION['cart'])&&array_keys($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $id=>$qty)//duyệt giỏ hàng
		{
			$sp = new clsSanpham();
			$gia = $sp->Lay_1_cot("giasp","id",$id);
			$cthd = new clsChitietHoadon();
			$cthd->GanThongtin(NULL,$id_hd,$id,$qty,$gia);
			$kq_cthd = $cthd->Them();
		}
	
	}
	unset($_SESSION['cart']);
	echo "<p>thành công</p>";
}
?>
