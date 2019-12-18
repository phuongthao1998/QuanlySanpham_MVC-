<?php
function Tao_Option($obj_list, $c_value, $c_label, $v_selected)
{
	foreach($obj_list->arr_data as $row)
	{
		$value = $row[$c_value];
		$label = $row[$c_label];
		$selected = ($value==$v_selected)?"selected":"";
		echo "\n<option value=\"$value\" $selected> $label </option>";
	}
}
/*
Dùng để tạo ra thẻ <select> <option>...</option></select> cho form
$tenSelect: đặt tên cho thẻ <select>
$TenBang: Bảng cần lấy dữ liệu
$CotValue: là cột dùng để đưa vào value của <option value="giatri">
$CotLabel: là cột dùng để đưa vào nhã của <option> nhãn</option>
*/
function TaoSelect($tenSelect,$TenBang,$CotValue,$CotLabel,$GiaTriChon)
{
	global $pdo_conn;
	$strSQL = "SELECT * FROM $TenBang";
	$pdo_stm = $pdo_conn->prepare($strSQL);
	$ketqua = $pdo_stm->execute();
	if($ketqua==FALSE)
		die("<h3> LỖI TRUY VẤN CSDL</H3>");
	//đẩy về trình duyệt thẻ <select> <option>...</option></select>
	echo "<select name='$tenSelect' id='$tenSelect'>";
	echo "<option value='0'> Chọn nhóm</option>";
	while($row = $pdo_stm->fetch())
	{
		$value = $row["$CotValue"];
		$label = $row["$CotLabel"];
		$selected = ($value==$GiaTriChon)?"selected":"";
		echo "\n<option value='$value' $selected> $label </option>";
	}
	echo "</select>";	
}
//Hàm UpladFiles(Tên input, Tên thư mục chứa ảnh)
//trả lại tên file ảnh sau khi upload hoặc trả về rỗng nếu lỗi 
//hoặc ko có file upload trong mảng $_FILES[] 
function UploadFiles($tenInput, $Tenthumuc)
{
//Xử lý ảnh upload đưa vào thư mục hinhanh
$file_name="";  
$file_size="";  
$file_type ="";  
$file_tmp ="";
$errors= array();//mảng chứa các thông báo lỗi
 if(isset($_FILES["$tenInput"]) && $_FILES["$tenInput"]["error"]==0)
 //nếu ảnh được được chọn và upload thành công
 {
	 $file_name = $_FILES["$tenInput"]["name"];//tên tệp
	 $file_size = $_FILES["$tenInput"]["size"];//kích thước tệp
	 $file_type = $_FILES["$tenInput"]["type"];//kiểu tệp
	 $file_tmp =$_FILES["$tenInput"]["tmp_name"];//đường dẫn và tên tệp nháp
	 //kiểm tra kích thước tệp upload
	 if($file_size > 1048576)//kích thước tệp lớn hơn 1MB (1048576 byte) thì ghi lại lỗi
	 {
         $errors[]='Kích thước tiệp phải nhỏ hơn 1 MB';
	 }
	 //kiểm tra kiểu file
	 $arr = explode('.',$file_name);
	 $duoitep=strtolower(end($arr));//lấy phần đuôi tệp
     $cactephople= array("jpeg","jpg","png","gif");
     if(in_array($duoitep,$cactephople)=== false)//nếu đuôi tệp không có trong mảng
	 {
         $errors[]="loại tệp không cho phép, chọn tệp JPEG hoặc PNG.";
     }
	 
	 if(empty($errors)==true)//nếu mảng $errors rỗng => không có lỗi
	 {
	 	move_uploaded_file($file_tmp,"$Tenthumuc/".$file_name);
	 }
	 else
	 {
		 print_r($errors);
	   die("<h3>Lỗi upload ảnh</h3>");
	}
	return $file_name;
 }	
}
?>








