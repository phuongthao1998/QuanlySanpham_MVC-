<H1> Chi tiết SẢN PHẨM</H1>
<?php
if($ketqua<0)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($ketqua==0)
	die("<h3> Không có sản phẩm nào</h3>");

	$row = $obj->arr_data; 
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
	  $tomtat = $row["tomtat"];
	  $noidung = $row["noidung"];
?>
     <div >
     	<div class="sanpham"  style="float:left;width:150px;">
        <p><a href="?module=sanpham&id=<?=$id?>"><?=$tensp?></a></p>
        <p>
        <img src="hinhanh/sanpham/<?=$hinhanh?>">
        </p>
        <p>Giá:<?=number_format($giasp)?> VNĐ</p>
        <p><a href="?module=giohang&cmd=add&item=<?=$id?>"> 
        Mua hàng</a></p>
    	</div>
        <div id="tomtatsp" style="float:right; width:400px; border:1px #F90 dashed">
                <h3> Tóm tắt sản phẩm:</h3>
				<?=$tomtat?>
         </div>
        <div id="noidungsp" style="clear:both;" >
        	<h3> Chi tiết sản phẩm:</h3>
        	<?=$noidung?>
         </div>
    </div>
