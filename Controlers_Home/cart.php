<?php
//session_start();
//require("KetNoiCSDL.php");
?>

<h1>Shopping Cart</h1>
<?php
$ok=1;//giỏ hàng rỗng
if(isset($_SESSION['cart']))
{
	if(array_keys($_SESSION['cart']))
		$ok=2;//giỏ hàng khác rỗng
}
if($ok == 2)
{


			echo "<form action='index.php?module=giohang&cmd=update' method='post'>";
			foreach($_SESSION['cart'] as $id=>$qty)
			{
				$item[]=$id;//mảng chứa các mã sản phẩm
			}
			$str=implode(",",$item);//tạo chuỗi "sp1,sp2,sp3,.."
				require_once("Models/clsSanpham.php");
			$sanpham = new clsSanpham();
			$ketqua = $sanpham->Lay_Banghi_Theo_DanhSach_ID($str);
			if($ketqua==-1)
				die("<h3> LỖI TRUY VẤN CSDL</H3>");
			$total=0;
			foreach($sanpham->arr_data as $row)
			{
				$id = $row["id"];
				  $masp = $row["masp"];
				  $tensp = $row["tensp"];
				  $giasp = $row["giasp"];
				  $hinhanh = $row["hinhanh"];
				  if($hinhanh=="")
					$hinhanh="noimage.png";
				  $trangthai = $row["trangthai"];	
			echo "<div class='pro'>";
			echo "<h3>$tensp</h3>";
			echo "Gia: ".number_format($giasp,3)." VND<br />";
			echo "<p align='right'>So Luong: <input type='text' name='qty[$id]' size='5' value='{$_SESSION['cart'][$id]}'> - ";
			echo "<a href='index.php?module=giohang&cmd=del&item=$id'>Xoa Sản phẩm này</a></p>";
			echo "<p align='right'> Gia tien cho mon hang: ". number_format($_SESSION['cart'][$id]*$giasp) ." VND</p>";
			echo "</div>";
			$total+=$_SESSION['cart'][$id]*$giasp;
			}
		echo "<div class='pro' align='right'>";
		echo "<b>Tong tien cho cac mon hang: <font color='red'>". number_format($total)." VND</font></b>";
		echo "</div>";
		echo "<input type='submit' name='capnhat' value='Cap Nhat Gio Hang'>";
		echo "<div class='pro' align='center'>";
		echo "<b><a href='index.php'>Mua tiếp</a> - <a href='index.php?module=giohang&cmd=del&item=0'>Xoa Bo Gio Hang</a></b>";
		echo "</div>";
		echo "<div class='pro' align='center'>";
		echo "<b><a href='index.php?module=thanhtoan'>Thanh toán</a></b>";
		echo "</div>";	
	}

else
	{
		echo "<div class='pro'>";
		echo "<p align='center'>Ban khong co mon hang nao trong gio hang<br /><a href='index.php'>Trang chủ</a></p>";
		echo "</div>";
	}
?>
