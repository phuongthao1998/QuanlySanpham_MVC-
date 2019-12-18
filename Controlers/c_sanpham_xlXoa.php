<?php
if(isset($_REQUEST["id"]))
{
	$id = $_REQUEST["id"];
	
	$sp_test = new clsSanpham();
	$kq_test = $sp_test->KiemTraHoaDon($id);
	
	$tb_ketqua ="";
	$nd_link ="Danh sách sản phẩm";
	$tb_khac = "";
	if($kq_test<0)
		$tb_ketqua ="Lỗi truy vấn dữ liệu";
	else if($kq_test>0)//nếu đã có sản phẩm trong hóa đơn
	{
	 $tb_khac = "<h3> Sản phẩm đã có đơn hàng. Không được xóa</h3>";
	 $tb_khac .="<h3> sản phẩm sẽ đổi trạng thái về KHÔNG</H3>";
	 	$sanpham = new clsSanpham();
		$ketqua = $sanpham->Sua_Mot_Cot("trangthai",0,$id);
		if($ketqua <0)
			$tb_ketqua= "LỖI UPDATE DỮ LIỆU";
		else	
			$tb_ketqua= "UPDATE CÔNG";
	}
	else{
		$sanpham = new clsSanpham();
		$ketqua = $sanpham->Xoa($id);
		if($ketqua <0)
			$tb_ketqua= "LỖI XÓA DỮ LIỆU";
		else	
			$tb_ketqua= "XÓA THÀNH CÔNG";
	}
	require("Views/v_thongbao_ketqua.php");
}
?>