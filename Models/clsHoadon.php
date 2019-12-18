<?php
require_once("clsDatabase.php");
class clsHoadon
{
	//khai báo thuộc tính dạng mảng chứa các cột của bảng
	var $arr_data = array();
	var $lastID =0;
	//khai báo hàm tạo và các phương thức: thêm, sửa, xóa, truy vấn lấy dữ liệu...
	public function clsHoadon()
	{
	}
	//hàm gán thông tin cho các thuộc tính của mảng
	public function GanThongtin($mahd,$tennguoimua,$dienthoai,$ngaydat,$ngaynhan,$trangthai)
	{
		$this->arr_data[0] = $mahd;
		$this->arr_data[1] = $tennguoimua;
		$this->arr_data[2] = $dienthoai;
		$this->arr_data[3] = $ngaydat;
		$this->arr_data[4] = $ngaynhan;
		$this->arr_data[5] = $trangthai;
	}
	//xây dựng các hàm thêm, sửa, xóa, truy vấn cơ bản
	public function Them()
	{
		//tạo đối tượng từ lớp clsDatabase, 
		//tương ứng với việc gọi hàm tạo clsDatabase() của lớp này để kết nối CSDL
		$db = new clsDatabase();
		//xây dựng câu lệnh cập nhật dữ liệu
		$str_sql = "INSERT INTO tbHoadon(tennguoimua, dienthoai, ngaynhan, trangthai) VALUES(?,?,?,?)";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri =  array($this->arr_data[1],$this->arr_data[2],$this->arr_data[4],$this->arr_data[5]);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->lastID = $db->pdo_conn->lastInsertId(); 
		return $ketqua;
	}
	public function Sua()
	{
		
	}
	public function Xoa($id)
	{
		$db = new clsDatabase();
		$str_sql = "DELETE FROM tbhoadon WHERE mahd=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($id);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}
	public function Truyvan_1_Banghi($tencot,$giatri)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT * FROM tbhoadon WHERE $tencot=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($giatri);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_1_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}
	public function Truyvan_Toanbo_Banghi($sapxep="",$trangthai=-1)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT * FROM tbHoadon ";
		if($trangthai==0|| $trangthai==1|| $trangthai==2|| $trangthai==3)
		{
			$str_sql .= " WHERE trangthai=$trangthai ";
		}
		if(strtoupper($sapxep)=="ASC" || strtoupper($sapxep) == "DESC")
		{
			$str_sql .= " ORDER BY mahd $sapxep";
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
		
	}
	public function Sua_Mot_Cot($tencot,$giatri,$id)
	{
		$db = new clsDatabase();
		//xây dựng câu lệnh cập nhật dữ liệu
		$str_sql = "UPDATE tbhoadon 
			SET $tencot=? WHERE mahd=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($giatri,$id);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}
	//hàm đầu vào là mã hóa đơn, trả về tổng tiền của hóa đơn
	public function TongTien($mahd)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT SUM(soluong*giamua) AS tongtien FROM `tbchitiethoadon` WHERE mahd=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($mahd);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		$tongtien=0;
		if($ketqua>0)
		{
			$this->arr_data = $db->Lay_1_Ban_Ghi_Dang_Mang();
			$tongtien = $this->arr_data["tongtien"];
		}
		return $tongtien;		
	}
	//đầu vào là tên cột và giá trị tìm kiếm
	//trả về id của sản phẩm có giá trị tìm trên cột đó
	public function Lay_1_cot($tencot,$tencot_tim,$giatri)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT $tencot FROM tbhoadon WHERE $tencot_tim=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($giatri);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
		{
			$this->arr_data = $db->Lay_1_Ban_Ghi_Dang_Mang();
			return $this->arr_data[$tencot];//trả về giá trị của cột trên bản ghi tìm được
		}
		return -1;
	}
}
?>