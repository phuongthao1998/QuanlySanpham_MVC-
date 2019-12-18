<?php
session_start();
require("kiemtra_login.php");
require("Dungchung/Tienich.php")
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Giao diện</title>
<script language="javascript" src="JS/JQuery.js"></script>
<script language="javascript" src="JS/ckeditor/ckeditor.js"></script>
<script language="javascript" src="JS/ckfinder/ckfinder.js"></script>
<link rel="stylesheet" type="text/css" href="CSS/Style.css">
<link rel="stylesheet" type="text/css" href="CSS/Menu.css">
</head>

<body>
<div id="khung">
	<div id="header" style="color:white">  
    Xin chào: <?=$_SESSION["taikhoan"]?>
    <br>
    <a href="Logout.php" style="color:white"> Đăng xuất</a>
    </div>
    <div id="menu">
      <ul>
        <li><a href="index_admin.php">Trang chủ</a></li>
        <li><a href="?module=nhomsp">Nhóm sản phẩm</a></li>
        <li><a href="?module=sanpham">Sản phẩm</a></li>
        <li><a href="?module=tintuc">Tin tức</a></li>
        <?php 
		if($_SESSION["loaiquantri"]==1)
		{
		?>
        <li><a href="?module=hoadon">Quản lý hóa đơn</a></li>
        <?php
		}
		?>
      </ul>
    </div>
    <div id="noidung" class="clear_fix">
    	<h1> QUẢN TRỊ WEBSITE</h1>
        <?php
		$module="";
		if(isset($_REQUEST["module"]))
			$module = $_REQUEST["module"];
		switch($module)
		{
			case "nhomsp":
				require("Controlers/c_nhomsp.php");
				break;
			case "sanpham":
				require("Controlers/c_sanpham.php");
				break;
			case "tintuc":
				require("Controlers/c_tintuc.php");
				break;
			case "hoadon":
				require("Controlers/c_hoadon.php");
				break;		
			default:
				echo "Module $module chưa có";		
		}
		?>
    </div>
    <div id="footer"> 
    	<p>Liên Hệ: Ths. Trần Mạnh Trường</p>
        <p>Mobile: 0912356004 | Email/Fb: Truongtm@gmailc.com</p>
        </div>
</div>
</body>
</html>	
