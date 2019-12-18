<h2 align="center">Danh sách sản phẩm</h2>
<p><a href="?module=<?=$module?>&cmd=them">Thêm sản phẩm</a></p>

<form name="fTimkiem" id="fTimkiem" action="?module=<?=$module?>" method="post">
Từ khóa:
<input type="text" name="tTukhoa" id="tTukhoa" value="<?=$tukhoa?>">

Giá từ:
<input type="text" name="tGia1" id="tGia1" value="<?=$gia1?>">
Đến:
<input type="text" name="tGia2" id="tGia2" value="<?=$gia2?>">
Nhóm SP:
<select name="sMaNhom" id="sMaNhom">
    <option value="0"> Tất cả nhóm SP </option>
    <?php
	 Tao_Option($obj_list,"manhom","tennhom",$manhom);
    ?>
</select>
<input type="submit" name="bSubmit" id="bSubmit" value="Tìm kiếm">
</form>
<br>
<?php
if($ketqua<0)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($ketqua==0)
	die("<h3> Không có sản phẩm nào</h3>");
?>
<table width="949" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="52" bgcolor="#FFCC00">ID</td>
    <td width="89" bgcolor="#FFCC00">Mã SP</td>
    <td width="178" bgcolor="#FFCC00">Tên SP</td>
    <td width="121" bgcolor="#FFCC00">Giá SP</td>
    <td width="143" bgcolor="#FFCC00">Hình ảnh</td>
    <td width="116" bgcolor="#FFCC00">Nhóm SP</td>
    <td width="119" bgcolor="#FFCC00">Trạng thái</td>
    <td width="113" bgcolor="#FFCC00">Thực hiện</td>
  </tr>
  <?PHP
  //$stt=0;
  foreach($obj->arr_data as $row)//lấy từng dòng từ bảng tbSanpham
  {
	  //$stt++;
	  $id = $row["id"];
	  $masp = $row["masp"];
	  $tensp = $row["tensp"];
	  $giasp = $row["giasp"];
	  $tennhom = $row["tennhom"];
	  $hinhanh = $row["hinhanh"];
	  if($hinhanh=="")
	  	$hinhanh="noimage.png";
	  $trangthai = $row["trangthai"];
  ?>
  <tr>
    <td><?=$id?></td>
    <td><?=$masp?></td>
    <td><?=$tensp?></td>
    <td><?=$giasp?></td>
    <td><img src="Hinhanh/Sanpham/<?=$hinhanh?>" width="50"></td>
    <td><?=$tennhom?></td>
    <td><?=($trangthai==1)?"có":"không"?></td>
    <td>
    <a href="?module=<?=$module?>&cmd=sua&id=<?=$id?>">Sửa</a> 
    - 
    <a href="?module=<?=$module?>&cmd=xoa&id=<?=$id?>" 
    	onClick="return confirm('Bạn chắc chắn xóa không?');">Xóa</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
