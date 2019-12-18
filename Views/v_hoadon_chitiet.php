<h2 align="center">Chi tiết Hóa đơn</h2>

<?php
if($ketqua<0 || $kq_hoadon<0)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($ketqua==0 || $kq_hoadon==0)
	die("<h3> Không có chi tiết hóa đơn nào</h3>");

$row = $hoadon->arr_data;//lấy bản ghi từ kết quả truy vấn hóa đơn chung
$mahd = $row["mahd"];
$tennguoimua = $row["tennguoimua"];
$dienthoai = $row["dienthoai"];
$ngaydat = $row["ngaydat"];
$ngaynhan = $row["ngaynhan"];
$trangthai = $row["trangthai"];
$trangthai2 ="khác";
switch($trangthai)
{
	case 0:
		$trangthai2 ="mới";
		break;
	case 1:
		$trangthai2 ="đã duyệt";
		break;	
	case 2:
		$trangthai2 ="đã thanh toán";
		break;		
	case 3:
		$trangthai2 ="đã hủy";
		break;	
}
?>
<h3>Tên người mua: <?=$tennguoimua?></h3>
<h3>Điện thoại: <?=$dienthoai?></h3>
<h3>Ngày đặt hàng: <?=$ngaydat?></h3>
<h3>Ngày nhận hàng: <?=$ngaynhan?></h3>
<h3>Trạng thái: <?=$trangthai2?></h3>

<select name="sTrangthai" id="sTrangThai" onChange="doitrangthai();">
	<option value=""> Đổi trạng thái HĐ</option>
    <option value="0"> Mới</option>
    <option value="1"> Đã duyệt</option>
    <option value="2"> Đã thanh toán</option>
    <option value="3"> Hủy hóa đơn</option>
</select>
<script language="javascript">
function doitrangthai()
{
	v = $("#sTrangThai").val();
	if(v!="")
	{
		window.location.href="?module=<?=$module?>&cmd=xl_sua&tt="+v+
						"&mahd=<?=$mahd?>&ttht=<?=$trangthai?>";
	}
}
</script>
<h2>Tổng tiền:<?=number_format($tongtienhd)?> vnđ</h2>

<table width="664" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="59" bgcolor="#FFCC00">STT</td>
    <td width="50" bgcolor="#FFCC00">ID Sản phẩm</td>
    <td width="174" bgcolor="#FFCC00">Tên sản phẩm</td>
    <td width="138" bgcolor="#FFCC00">Hình ảnh</td>
    <td width="138" bgcolor="#FFCC00">Giá mua</td>
    <td width="134" bgcolor="#FFCC00">Số lượng</td>
    <td width="134" bgcolor="#FFCC00">Thành tiền</td>
  </tr>
  <?PHP
  $stt=0;
   foreach($obj->arr_data as $row)
   {
	  $stt++;
	  $masp = $row["idsp"];
	  $tensp = $row["tensp"];
	  $hinhanh = $row["hinhanh"];
	  $giamua = $row["giamua"];
	  $soluong = $row["soluong"];
	  $thanhtien = $row["tongtiensp"];
	  
	  if($hinhanh=="")
	  	$hinhanh="noimage.png";
  ?>
  <tr>
    <td><?=$stt?></td>
    <td><?=$masp?></td>
    <td><?=$tensp?></td>
    <td><img src="Hinhanh/Sanpham/<?=$hinhanh?>" width="50"></td>
    <td><?=number_format($giamua)?> vnđ</td>
    <td><?=$soluong?></td>
    <td><?=number_format($thanhtien)?> vnđ</td>
  </tr>
  <?php
  }
  ?>
</table>
