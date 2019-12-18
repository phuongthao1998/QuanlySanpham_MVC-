<h2 align="center">Thêm nhóm sản phẩm
</h2>
<form name="form1" method="post" action="?module=<?=$module?>&cmd=xl_them">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="178">Tên nhóm SP:</td>
      <td width="322"><input type="text" name="tTennhom" id="tTennhom"></td>
    </tr>
    <tr>
      <td>Số thứ tự:</td>
      <td><input type="text" name="tThutu" id="tThutu"></td>
    </tr>
    <tr>
      <td>Trạng thái:</td>
      <td>
      Có 
      <input type="radio" name="rTrangthai" id="rTranghai1" value="1">
      Không
      <input type="radio" name="rTrangthai" id="rTranghai2" value="0">
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="bSubmit" id="bSubmit" value="Đồng ý"> 
           <input type="reset" name="Reset" id="button" value="Nhập lại"></td>
    </tr>
  </table>
</form>
