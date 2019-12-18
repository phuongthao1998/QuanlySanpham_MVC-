<?php
require_once("clsDatabase.php");
class clsNhomSP
{
	//khai báo thuộc tính dạng mảng chứa các cột của bảng
	var $arr_data = array();
	//khai báo hàm tạo và các phương thức: thêm, sửa, xóa, truy vấn lấy dữ liệu...
	public function clsNhomSP()
	{
	}
	//hàm gán thông tin cho các thuộc tính của mảng
	public function GanThongtin($manhom,$tennhom,$sothutu,$trangthai)
	{
		$this->arr_data[0] = $manhom;
		$this->arr_data[1] = $tennhom;
		$this->arr_data[2] = $sothutu;
		$this->arr_data[3] = $trangthai;
	}
	//xây dựng các hàm thêm, sửa, xóa, truy vấn cơ bản
	public function Them()
	{
		//tạo đối tượng từ lớp clsDatabase, 
		//tương ứng với việc gọi hàm tạo clsDatabase() của lớp này để kết nối CSDL
		$db = new clsDatabase();
		//xây dựng câu lệnh cập nhật dữ liệu
		$str_sql = "INSERT INTO tbnhomsp VALUES(?,?,?,?)";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = $this->arr_data;
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}
	public function Sua()
	{
		//tạo đối tượng từ lớp clsDatabase, 
		//tương ứng với việc gọi hàm tạo clsDatabase() của lớp này để kết nối CSDL
		$db = new clsDatabase();
		//xây dựng câu lệnh cập nhật dữ liệu
		$str_sql = "UPDATE tbnhomsp 
			SET tennhom=?,sothutu=?,trangthai=? WHERE manhom=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($this->arr_data[1],$this->arr_data[2],
		$this->arr_data[3],$this->arr_data[0]);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}
	public function Xoa($id)
	{
		$db = new clsDatabase();
		$str_sql = "DELETE FROM tbnhomsp WHERE manhom=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($id);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}
	public function Truyvan_1_Banghi($tencot,$giatri)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT * FROM tbnhomsp WHERE $tencot=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($giatri);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_1_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}
	public function Truyvan_Toanbo_Banghi($sapxep="", $trangthai=2)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT * FROM tbNhomSP ";
		if($trangthai==1 || $trangthai==0)
		{
			$str_sql .= " WHERE trangthai=$trangthai";
		}
		if(strtoupper($sapxep)=="ASC" || strtoupper($sapxep) == "DESC")
		{
			$str_sql .= " ORDER BY sothutu $sapxep";
		}
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array();
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_Toanbo_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}
	public function Timkiem($tukhoa)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT * FROM tbNhomSP ";
		//bổ sung xử lý điều kiện tìm kiếm cho mệnh đề WHERE
		$dieukien = "";
		//tạo điều kiện tìm theo từ khóa
		if($tukhoa!="")//nếu tìm theo từ khóa
		{
			$dieukien = " WHERE tennhom LIKE '%$tukhoa%' ";
		}
		$str_sql .= $dieukien;	
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array();
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_Toanbo_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}
	public function Sua_Mot_Cot($tencot,$giatri,$id)
	{
		$db = new clsDatabase();
		//xây dựng câu lệnh cập nhật dữ liệu
		$str_sql = "UPDATE tbnhomsp 
			SET $tencot=? WHERE manhom=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($giatri,$id);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}
}
?>