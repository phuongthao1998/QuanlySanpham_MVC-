<?php
require_once("clsDatabase.php");
class clsChitietHoadon
{
	//khai báo thuộc tính dạng mảng chứa các cột của bảng
	var $arr_data = array();
	var $lastID =0;
	//khai báo hàm tạo và các phương thức: thêm, sửa, xóa, truy vấn lấy dữ liệu...
	public function clsChitietHoadon()
	{
	}
	//hàm gán thông tin cho các thuộc tính của mảng
	public function GanThongtin($id,$mahd,$idsp,$soluong,$giamua)
	{
		$this->arr_data[0] = $id;
		$this->arr_data[1] = $mahd;
		$this->arr_data[2] = $idsp;
		$this->arr_data[3] = $soluong;
		$this->arr_data[4] = $giamua;
	}
	//xây dựng các hàm thêm, sửa, xóa, truy vấn cơ bản
	public function Them()
	{
		//tạo đối tượng từ lớp clsDatabase, 
		//tương ứng với việc gọi hàm tạo clsDatabase() của lớp này để kết nối CSDL
		$db = new clsDatabase();
		//xây dựng câu lệnh cập nhật dữ liệu
		$str_sql = "INSERT INTO tbchitiethoadon VALUES(?,?,?,?,?)";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = $this->arr_data;
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}

	public function Truyvan_MaHD($mahd)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT CT.*, SP.tensp,SP.hinhanh, 
			giamua*soluong AS tongtiensp
		 FROM tbchitiethoadon CT INNER JOIN tbsanpham SP
		 ON CT.idsp = SP.id
		 WHERE mahd=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($mahd);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_Toanbo_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}
	public function Xoa($id)
	{
		$db = new clsDatabase();
		$str_sql = "DELETE FROM tbchitiethoadon WHERE mahd=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($id);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}
}
?>