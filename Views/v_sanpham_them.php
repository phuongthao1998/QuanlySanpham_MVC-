<h2 align="center">Thêm sản phẩm
</h2>
<form name="form1" method="post" action="?module=<?=$module?>&cmd=xl_them" enctype="multipart/form-data">
  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="200">Mã SP:</td>
      <td width="600"><input type="text" name="tMaSP" id="tMaSP"></td>
    </tr>
    <tr>
      <td>Tên SP:</td>
      <td><input type="text" name="tTenSP" id="tTenSP"></td>
    </tr>
    <tr>
      <td>Giá SP:</td>
      <td><input type="text" name="tGiaSP" id="tGiaSP"></td>
    </tr>
    <tr>
      <td>Ảnh Sản phẩm:</td>
      <td><input type="file" name="fAnhSP" id="fAnhSP"></td>
    </tr>
    <tr>
      <td>Nhóm sản phẩm:</td>
      <td>
        <select name="sNhomSP" id="sNhomSP">
        <option value="0"> Tất cả nhóm SP </option>
        <?php
         Tao_Option($obj_list,"manhom","tennhom",0);
        ?>
    	</select>
      </td>
    </tr>
     <tr>
      <td>Tóm tắt:</td>
      <td><textarea name="tTomtat" id="tTomtat" rows="5" cols="50"></textarea></td>
    </tr>
     <tr>
      <td>Nội dung chi tiết:</td>
      <td><textarea name="tNoidung" id="tNoidung" rows="5" cols="50"></textarea></td>
    </tr>
     <tr>
      <td>Trạng thái:</td>
      <td>Có: <input type="radio" name="rTrangthai" value="1" checked>
      Không: <input type="radio" name="rTrangthai" value="0">
      </td>
    </tr>
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