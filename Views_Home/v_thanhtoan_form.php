<script language="javascript">
$(document).ready(function(e) {
    $("#tNgaynhan").datetimepicker();
});
</script>
<h1>Nhập thông tin mua hàng</h1>
<form name="form1" method="post" action="index.php?module=thanhtoan&cmd=xuly">
  <p>Tên người mua:
    <input type="text" name="tHoten" id="tHoten">
    
  </p>
  <br>
  <p>Điện thoại:
    <input type="text" name="tDienthoai" id="tDienthoai">
  </p>
  <br>
  <p>Ngày nhận:
    <input type="text" name="tNgaynhan" id="tNgaynhan">
 	
  </p>
  <br>
  <p>
    <input type="submit" name="button" id="button" value="Đồng ý">
  	
  </p>
</form>

<h2>Liên hệ: Nguyễn Quốc Tuấn, 09123456678</h>
<h2>Thanh toán qua tài khoản 000111222 tài ngân hàng Nông nghiệp</h>
