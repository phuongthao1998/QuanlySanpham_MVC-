<h2 align="center">Danh sách nhóm sản phẩm</h2>
<p><a href="?module=<?=$module?>&cmd=them">Thêm nhóm sản phẩm</a></p>
<?php
if($ketqua<0)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($ketqua==0)
	die("<h3> Không có nhóm sản phẩm nào</h3>");
?>
<table width="664" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="59" bgcolor="#FFCC00">Mã nhóm</td>
    <td width="247" bgcolor="#FFCC00">Tên nhóm</td>
    <td width="74" bgcolor="#FFCC00">Thứ tự</td>
    <td width="138" bgcolor="#FFCC00">Trạng thái</td>
    <td width="134" bgcolor="#FFCC00">Thực hiện</td>
  </tr>
  <?PHP
   foreach($obj->arr_data as $row)
  {
	  $manhom = $row["manhom"];
	  $tennhom = $row["tennhom"];
	  $thutu = $row["sothutu"];
	  $trangthai = $row["trangthai"];
  ?>
  <tr>
    <td><?=$manhom?></td>
    <td><?=$tennhom?></td>
    <td><?=$thutu?></td>
    <td><?=($trangthai==1)?"Có":"Không"?></td>
    <td>
    <a href="?module=<?=$module?>&cmd=sua&manhom=<?=$manhom?>">Sửa</a> 
    - 
    <a href="?module=<?=$module?>&cmd=xoa&manhom=<?=$manhom?>" 
    	onClick="return confirm('Bạn chắc chắn xóa không?');">Xóa</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
