<?php
session_start();
require("Models/clsQuantri.php");
if(isset($_REQUEST["tTaikhoan"]))
{
	$taikhoan = $_REQUEST["tTaikhoan"];
	$matkhau = md5($_REQUEST["tMatkhau"]);
	$quantri = new clsQuantri();
	$ketqua = $quantri->Timkiem($taikhoan,$matkhau);
	if($ketqua<0)
		echo "<h3> Lỗi Cơ sở dữ liệu</h3>";
	else if($ketqua==0)
	{
		echo "<h3> Sai thông tin đăng nhập</h3>";
		echo "<a href='Login.php'> Mời đăng nhập lại </a>";
		$_SESSION["login"]="";
	}
	else
	{
		$loai = $quantri->arr_data["loai"];
		$_SESSION["login"]="OK";
		$_SESSION["taikhoan"] = $taikhoan;
		$_SESSION["loaiquantri"]= $loai;
		echo "<h3> Đăng nhập thành công</h3>";
		echo "<a href='index_admin.php'> Vào trang chủ </a>";
	}
}
?>