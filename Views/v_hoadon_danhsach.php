<h2 align="center">Danh sách Hóa đơn</h2>

<?php
if($ketqua<0)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($ketqua==0)
	die("<h3> Không có hóa đơn nào</h3>");
?>
<table width="664" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="59" bgcolor="#FFCC00">Mã HĐ</td>
    <td width="247" bgcolor="#FFCC00">Tên người mua</td>
    <td width="74" bgcolor="#FFCC00">Điện thoại</td>
    <td width="138" bgcolor="#FFCC00">Ngày đặt hàng</td>
    <td width="138" bgcolor="#FFCC00">Ngày nhận hàng</td>
    <td width="134" bgcolor="#FFCC00">Trạng thái</td>
    <td width="134" bgcolor="#FFCC00">Tổng tiền</td>
    <td width="134" bgcolor="#FFCC00">Thực hiện</td>
  </tr>
  <?PHP
   foreach($obj->arr_data as $row)
  {
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
	  //tính tổng tiền
	  $tongtien =0;
	  $hoadon = new clsHoadon();
	  $tongtien = $hoadon->TongTien($mahd);
  ?>
  <tr>
    <td>
    <a href="?module=<?=$module?>&cmd=chitiethd&mahd=<?=$mahd?>">
	<?=$mahd?>
    </a>
    </td>
    <td><?=$tennguoimua?></td>
    <td><?=$dienthoai?></td>
    <td><?=$ngaydat?></td>
    <td><?=$ngaynhan?></td>
    <td><?=$trangthai2?></td>
    <td><?=number_format($tongtien)?> vnđ</td>
    <td align="center">
    <?php
	if($trangthai!=2)
	{
	?>
    <a href="?module=<?=$module?>&cmd=xoa&mahd=<?=$mahd?>" 
    onClick="return confirm('Chắc chắn xóa?');">Xóa</a>
    <?php
	}
	else
		echo "---";
	?>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
