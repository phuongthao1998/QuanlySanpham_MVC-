<h2 align="center">Sửa nhóm sản phẩm</h2>
<?php

if($ketqua<0)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($ketqua==0)
	die("<h3> Không có nhóm sản phẩm nào</h3>");
//$row = $pdo_smt->fetch();//lấy dữ liệu trả về $row dạng mảng	
$row = $obj->arr_data;
$tennhom = $row["tennhom"];
$thutu = $row["sothutu"];
$trangthai = $row["trangthai"];
?>
<form name="form1" method="post" action="?module=<?=$module?>&cmd=xl_sua">
<input type="hidden" name="manhom" id="manhom" value="<?=$manhom?>">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="178">Tên nhóm:</td>
      <td width="322">
  <input type="text" name="tTennhom" id="tTennhom" value="<?=$tennhom?>">
  	</td>
    </tr>
    <tr>
      <td>Thứ tự:</td>
      <td><input type="text" name="tThutu" id="tThutu" value="<?=$thutu?>"></td>
    </tr>
    <tr>
      <td>Trạng thái:</td>
      <td>
      Có 
      <input type="radio" name="rTrangthai" id="rTranghai1" 
      	value="1" <?=($trangthai==1?"checked":"")?>>
      Không
      <input type="radio" name="rTrangthai" id="rTranghai2" 
      value="0" <?=($trangthai==0?"checked":"")?>>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="bSubmit" id="bSubmit" value="Đồng ý"> 
           <input type="reset" name="Reset" id="button" value="Nhập lại"></td>
    </tr>
  </table>
</form>