<?php
	$tt=$_REQUEST["tt"];
	$mahd = $_REQUEST["mahd"];
	$ttht = $_REQUEST["ttht"];
	$chophep = "";
	if($ttht==0||
		($ttht==1&&($tt==2||$tt==3))||
		($ttht==3&&($tt==1||$tt==2)))
	{
		$chophep="OK";
	}
	$tb_ketqua ="";
	$nd_link ="DANH SÁCH HÓA ĐƠN";
	$tb_khac = "";
	if($chophep=="OK")
	{
		$hoadon = new clsHoadon();
		$ketqua=$hoadon->Sua_Mot_Cot("trangthai",$tt,$mahd);
		if($ketqua <0)
			$tb_ketqua = "LỖI SỬA DỮ LIỆU";
		else	
			$tb_ketqua =  "SỬA THÀNH CÔNG";
	}
	else
		$tb_ketqua =  "Chuyển trạng thái không hợp lệ";
	require("Views/v_thongbao_ketqua.php");	

?>