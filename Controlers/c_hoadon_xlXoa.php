<?php
if(isset($_REQUEST["mahd"]))
{
	$mahd = $_REQUEST["mahd"];

	$tb_ketqua ="";
	$nd_link ="Danh sách Hóa đơn";
	$tb_khac = "";
		
	$hoadon = new clsHoadon();
	$trangthai = $hoadon->Lay_1_cot("trangthai","mahd",$mahd);
	if($trangthai!=2)
	{
		//xóa các chi tiết hóa đơn liên quan đến mã hóa đơn này
		$chitiethd = new clsChitietHoadon();
		$ketqua1 = $chitiethd->Xoa($mahd); 
		if($ketqua1>=0)
		{
			$ketqua = $hoadon->Xoa($mahd);
			if($ketqua <0)
				$tb_ketqua= "LỖI XÓA DỮ LIỆU";
			else	
				$tb_ketqua= "XÓA THÀNH CÔNG";
		}
	}
	require("Views/v_thongbao_ketqua.php");
}
?>