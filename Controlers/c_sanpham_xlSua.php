<?php
if(isset($_POST["bSubmit"])){
	
	$hinhanh = UploadFiles("fAnhSP","Hinhanh/Sanpham");
	
	$id = $_POST["id"];
	$masp = $_POST["tMaSP"];
	$tensp = $_POST["tTenSP"];
	$giasp = $_POST["tGiaSP"];
	$manhom = $_POST["sNhomSP"];
	$tomtat = $_POST["tTomtat"];
	$noidung = $_POST["tNoidung"];
	$trangthai = $_POST["rTrangthai"];
	
	if($hinhanh=="")
	$hinhanh = $_POST["tAnhHientai"];
	
	if($masp=="" || $tensp=="" || $giasp=="" || !is_numeric($giasp))
	die("<H3> phải nhập đúng và đủ thông tin</H3>");
	
	$tb_ketqua ="";
    $nd_link ="Danh sách sản phẩm";
	$tb_khac="";
	//kiểm tra mã sp có bị trùng không?
	$sp_test = new clsSanpham();
	$id_test = $sp_test->getID("masp",$masp);
	if($id_test>0 && $id_test!=$id)
	{
		$tb_ketqua ="Mã sản phẩm $masp đã tồn tại. Không được SỦA";
	}
	else
	{
		$sanpham = new clsSanpham();
		$sanpham->GanThongtin($id,$masp,$tensp,$giasp,$manhom,$hinhanh, 
									$tomtat,$noidung,$trangthai);
		$ketqua = $sanpham->Sua();
		if($ketqua <0)
			$tb_ketqua = "LỖI SỬA DỮ LIỆU";
		else	
			$tb_ketqua =  "SỬA THÀNH CÔNG";
	}
	require("Views/v_thongbao_ketqua.php");	
}
?>