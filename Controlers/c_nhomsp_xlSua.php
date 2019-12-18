<?php
//require("../Models/clsNhomSP.php");
if(isset($_POST["bSubmit"])){
	$manhom = $_POST["manhom"];
	$tennhom = $_POST["tTennhom"];
	$thutu = $_POST["tThutu"];
	$trangthai = 0;
	if(isset($_POST["rTrangthai"]))
		$trangthai=$_POST["rTrangthai"];
		
	$nhomsp = new clsNhomSP();
	$nhomsp->GanThongtin($manhom,$tennhom,$thutu,$trangthai);
	$ketqua = $nhomsp->Sua();
	$tb_ketqua ="";
	$nd_link ="Danh sách nhóm sản phẩm";
	$tb_khac = "";
	if($ketqua <0)
		$tb_ketqua = "LỖI SỬA DỮ LIỆU";
	else	
		$tb_ketqua =  "SỬA THÀNH CÔNG";
	require("Views/v_thongbao_ketqua.php");	
}
?>