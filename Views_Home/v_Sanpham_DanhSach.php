<H1> DANH SÁCH SẢN PHẨM</H1>
<?php
if($ketqua<0)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($ketqua==0)
	die("<h3> Không có sản phẩm nào</h3>");
foreach($obj->arr_data as $row)//lấy từng dòng từ bảng tbSanpham
  {
	  //$stt++;
	  $id = $row["id"];
	  $masp = $row["masp"];
	  $tensp = $row["tensp"];
	  $giasp = $row["giasp"];
	  //$tennhom = $row["tennhom"];
	  $hinhanh = $row["hinhanh"];
	  if($hinhanh=="")
	  	$hinhanh="noimage.png";
	  $trangthai = $row["trangthai"];	
?>
     <div class="sanpham">
        <p><a href="?module=sanpham&id=<?=$id?>"><?=$tensp?></a></p>
        <p>
        <img src="hinhanh/sanpham/<?=$hinhanh?>">
        </p>
        <p>Giá:<?=number_format($giasp)?> VNĐ</p>
        <p><a href="?module=giohang&cmd=add&item=<?=$id?>"> Mua hàng</a></p>
    </div>
<?php
  }
?> 