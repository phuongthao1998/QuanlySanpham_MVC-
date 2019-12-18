<h2 align="center">Sửa sản phẩm</h2>
<?php

if($ketqua<0)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($ketqua==0)
	die("<h3> Không có sản phẩm nào</h3>");
$row = $obj->arr_data;//lấy dữ liệu trả về $row dạng mảng	
$id = $row["id"];
$masp = $row["masp"];
$tensp = $row["tensp"];
$giasp = $row["giasp"];
$manhom = $row["manhom"];

$hinhanh = $row["hinhanh"];
//gán tên ảnh để hiện thị lên thẻ img
$anh_hienthi ="noimage.png";
if($hinhanh!="")
	$anh_hienthi =$hinhanh;

$tomtat = $row["tomtat"];
$noidung = $row["noidung"];
$trangthai = $row["trangthai"];	
?>
<form name="form1" method="post" action="?module=<?=$module?>&cmd=xl_sua" enctype="multipart/form-data">
<input type="hidden" name="id" id="id" value="<?=$id?>">
  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="227">Mã SP:</td>
      <td width="573">
  <input type="text" name="tMaSP" id="tMaSP" value="<?=$masp?>"></td>
    </tr>
    <tr>
      <td>Tên SP:</td>
      <td><input type="text" name="tTenSP" id="tTenSP" value="<?=$tensp?>"></td>
    </tr>
    <tr>
      <td>Giá SP:</td>
      <td><input type="text" name="tGiaSP" id="tGiaSP" value="<?=$giasp?>"></td>
    </tr>
    <tr>
      <td>Ảnh hiện tại:</td>
      <td>
      <input type="text" name="tAnhHientai" id="tAnhHientai" 
      	value="<?=$hinhanh?>" readonly>
        <img src="Hinhanh/Sanpham/<?=$anh_hienthi?>" width="100">
        </td>
    </tr>
    <tr>
      <td>Nhập ảnh thay đổi:</td>
      <td>
      <input type="file" name="fAnhSP" id="fAnhSP">
       </td>
    </tr> 
    <tr>
      <td>Nhóm sản phẩm:</td>
      <td>
     <select name="sNhomSP" id="sNhomSP">
        <option value="0"> Tất cả nhóm SP </option>
        <?php
		 Tao_Option($obj_list,"manhom","tennhom",$manhom);
        ?>
    	</select>
      </td>
    </tr>
    <tr>
      <td>Tóm tắt:</td>
      <td>
      <textarea name="tTomtat" id="tTomtat" rows="5" cols="50"><?=$tomtat?></textarea></td>
    </tr>
     <tr>
      <td>Nội dung chi tiết:</td>
      <td>
      <textarea name="tNoidung" id="tNoidung" rows="5" cols="50"><?=$noidung?></textarea></td>
    </tr>
     <tr>
      <td>Trạng thái:</td>
      <td>
      Có: <input type="radio" name="rTrangthai" value="1" 
      <?=($trangthai==1)?"checked":""?>>
      Không: <input type="radio" name="rTrangthai" value="0" 
      <?=($trangthai==0)?"checked":""?>>
      </td>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="bSubmit" id="bSubmit" value="Đồng ý"> 
           <input type="reset" name="Reset" id="button" value="Nhập lại"></td>
    </tr>
  </table>
</form>
<script language="javascript">
var ckTomtat = CKEDITOR.replace('tTomtat');
ckTomtat.config.width = 700;
CKFinder.setupCKEditor(ckTomtat, null, { type: 'Images' });

var ckNoidung = CKEDITOR.replace('tNoidung');
ckNoidung.config.width = 700;
CKFinder.setupCKEditor(ckNoidung, null, { type: 'Images' });
</script>