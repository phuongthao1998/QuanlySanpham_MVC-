<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Giao diện</title>
<link rel="stylesheet" type="text/css" href="CSS_Home/Style.css">
<link rel="stylesheet" type="text/css" href="CSS_Home/Menu.css">
<link rel="stylesheet" type="text/css" href="CSS_Home/style_cart.css">
<script language="javascript" src="JS/jquery.js"></script>
<script language="javascript" src="JS/jquery.datetimepicker.full.min.js"></script>
<link rel="stylesheet" type="text/css" href="JS/jquery.datetimepicker.css">
</head>
<?php
require_once("Models/clsNhomSP.php");
$obj_Nhomsp_Menu = new clsNhomSP();
$ketqua_Nhomsp_Menu = $obj_Nhomsp_Menu->Truyvan_Toanbo_Banghi("ASC",1);
if($ketqua_Nhomsp_Menu<0)
	die("Lỗi truy vấn dữ liệu nhóm sản phẩm");
?>
<body>
<div id="khung">
	<div id="header">  
    </div>
    <div id="menu">
      <ul>
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="?module=tintuc">Tin tức</a>
            <ul>
                <li><a href="#">Thể thao</a></li>
                <li><a href="#">Giáo dục</a></li>
                <li><a href="#">Kinh tế</a></li>
            </ul>
        </li>
        <li><a href="?module=sanpham">Sản phẩm</a>
            <?php
			require("Views_Home/v_Menu_Sanpham.php");
			?>
        </li>
        <li><a href="?module=lienhe">Liên hệ</a></li>
        <li><a href="?module=giohang">Giỏ hàng</a></li>
      </ul>
    </div>
    <div id="noidung" class="clear_fix">
    	<div id="nd_Trai">
        	<H2> <a href="?module=sanpham">SẢN PHẨM</a></H2>
            <?php
			require("Views_Home/v_Menu_Sanpham.php");
			?>
        </div>
        <div id="nd_Giua"> 
        	<?php
			$module = "";
			if(isset($_REQUEST["module"]))
				$module = $_REQUEST["module"];
			switch($module)
			{
				case "tintuc":
					require("Controlers_Home/c_tintuc.php");
					break;
				case "sanpham":
					require("Controlers_Home/c_sanpham.php");
					break;
				case "lienhe":
					require("Controlers_Home/c_lienhe.php");
					break;
				case "giohang":
					require("Controlers_Home/c_giohang.php");
					break;
				case "thanhtoan":
					require("Controlers_Home/c_thanhtoan.php");
					break;	
				default:
					require("Controlers_Home/c_home.php");
	
			}
			?>
        </div>
        <div id="nd_Phai">
        <iframe width="200" src="https://www.youtube.com/embed/Y29OrOVJUKs?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>
    <div id="footer"> 
    	<p>Liên Hệ: Ths. Trần Mạnh Trường</p>
        <p>Mobile: 0912356004 | Email/Fb: Truongtm@gmailc.com</p>
        </div>
</div>
</body>
</html>	
