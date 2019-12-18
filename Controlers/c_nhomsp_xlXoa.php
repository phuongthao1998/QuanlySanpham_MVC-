<?php
//require("../Models/clsNhomSP.php");
require_once("Models/clsSanpham.php");
if(isset($_REQUEST["manhom"]))
{
	$manhom = $_REQUEST["manhom"];
	//kiểm tra nếu manhom chưa có sản phẩm nào liên quan thì xóa
	//nếu có sản phẩm liên quan thì update trangthai=FALSE
	//Tìm xem có sản phẩm nào có mã nhóm đó không?
	$sanpham = new clsSanpham();
	$ketqua = $sanpham->Truyvan_Nhieu_Banghi("manhom",$manhom);
	
	$tb_ketqua ="";
	$nd_link ="Danh sách nhóm sản phẩm";
	$tb_khac = "";
	if($ketqua<0)
		$tb_ketqua ="Lỗi truy vấn dữ liệu";
	else if($ketqua>0)//nếu đã có sản phẩm thì update trạng thái nhomsp
	{
	 $tb_khac = "<h3> Đang có " .$ketqua. " sản phẩm thuộc nhóm này</h3>";
		$tb_khac .= "<h3> nhóm $manhom đã có sản phẩm, không được xóa,
		trạng thái sẽ đổi về giá trị FALSE</H3>";
		$nhomsp = new clsNhomSP();
		$ketqua = $nhomsp->Sua_Mot_Cot("trangthai",0,$manhom);
		if($ketqua <0)
			$tb_ketqua= "LỖI update DỮ LIỆU";
		else	
			$tb_ketqua= "update THÀNH CÔNG";
	}
	else{
		$nhomsp = new clsNhomSP();
		$ketqua = $nhomsp->Xoa($manhom);
		if($ketqua <0)
			$tb_ketqua= "LỖI XÓA DỮ LIỆU";
		else	
			$tb_ketqua= "XÓA THÀNH CÔNG";
	}
	require("Views/v_thongbao_ketqua.php");
}
?>