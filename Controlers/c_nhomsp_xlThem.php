<?php
//require_once("Models/clsNhomSP.php");
if(isset($_POST["bSubmit"])){

	$tennhom = $_POST["tTennhom"];
	$thutu = $_POST["tThutu"];
	$trangthai = 0;
	if(isset($_POST["rTrangthai"]))
		$trangthai=$_POST["rTrangthai"];
		
	$nhomsp = new clsNhomSP();
	$nhomsp->GanThongtin(NULL,$tennhom,$thutu,$trangthai);
	$ketqua = $nhomsp->Them();
	$tb_ketqua ="";
	$nd_link ="Danh sách nhóm sản phẩm";
   $tb_khac="<a href='?module=$module&cmd=them'>Thêm nhóm sản phẩm</a>";
	if($ketqua <0)
		$tb_ketqua = "LỖI THÊM DỮ LIỆU";
	else	
		$tb_ketqua =  "THÊM THÀNH CÔNG";
	require("Views/v_thongbao_ketqua.php");	
}
?>