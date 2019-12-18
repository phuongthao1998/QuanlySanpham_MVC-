<?php
require_once("Models/clsSanpham.php");
$rq_id = "";
$rq_manhom ="";
//index.php?module=sanpham&id=n
$obj = new clsSanpham();
if(isset($_REQUEST["id"]))//nếu có id thì hiển thị chi tiết sp có id đó
{
	$rq_id = $_REQUEST["id"];
	$ketqua = $obj->Truyvan_1_Banghi("id",$rq_id);
	require("Views_Home/v_Sanpham_Chitiet.php");
}
else//hiển thị danh sách sản phẩm
{
	//index.php?module=sanpham&manhom=n
	if(isset($_REQUEST["manhom"]))//Tìm sản phẩm theo mã nhóm
	{
		$rq_manhom = $_REQUEST["manhom"];
		$ketqua = $obj->Truyvan_Nhieu_Banghi("manhom",$rq_manhom,1);
	}
	else//toàn bộ sản phẩm index.php?module=sanpham
	{
		//$ketqua = $obj->Truyvan_Toanbo_Banghi(1,1);
		$ketqua = $obj->Timkiem("","","",0,1,1);
	}
	require("Views_Home/v_Sanpham_DanhSach.php");
}
?>