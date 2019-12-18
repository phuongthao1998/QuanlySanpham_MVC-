<?php
if(isset($_POST["bSubmit"])){
	
	$hinhanh = UploadFiles("fAnhSP","Hinhanh/Sanpham");
	
	$masp = $_POST["tMaSP"];
	$tensp = $_POST["tTenSP"];
	$giasp = $_POST["tGiaSP"];
	$manhom = $_POST["sNhomSP"];
	$tomtat = $_POST["tTomtat"];
	$noidung = $_POST["tNoidung"];
	$trangthai = $_POST["rTrangthai"];
	
	if($masp=="" || $tensp=="" || $giasp=="" || !is_numeric($giasp))
	die("<H3> phải nhập đúng và đủ thông tin</H3>");
	
	$tb_ketqua ="";
    $nd_link ="Danh sách sản phẩm";
	$tb_khac="<a href='?module=$module&cmd=them'>Thêm sản phẩm</a>";
	//kiểm tra mã sp có bị trùng không?
	$sp_test = new clsSanpham();
	$id_test = $sp_test->getID("masp",$masp);
	if($id_test>0)
	{
		$tb_ketqua ="Mã sản phẩm $masp đã tồn tại. Không được thêm";
	}
	else
	{
		$sanpham = new clsSanpham();
		$sanpham->GanThongtin(NULL,$masp,$tensp,$giasp,$manhom,$hinhanh, 
									$tomtat,$noidung,$trangthai);
		$ketqua = $sanpham->Them();
		if($ketqua <0)
			$tb_ketqua = "LỖI THÊM DỮ LIỆU";
		else	
			$tb_ketqua =  "THÊM THÀNH CÔNG";
	}
	require("Views/v_thongbao_ketqua.php");	
}
?>