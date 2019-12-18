<?php
require_once("clsDatabase.php");
class clsSanpham
{
	//khai báo thuộc tính dạng mảng chứa các cột của bảng
	var $arr_data = array();
	//khai báo hàm tạo và các phương thức: thêm, sửa, xóa, truy vấn lấy dữ liệu...
	public function clsSanpham()
	{
	}
	//hàm gán thông tin cho các thuộc tính của mảng
	public function GanThongtin($id,$masp,$tensp,$giasp,$manhom,$hinhanh,$tomtat,$noidung,$trangthai)
	{
		$this->arr_data[0] = $id;
		$this->arr_data[1] = $masp;
		$this->arr_data[2] = $tensp;
		$this->arr_data[3] = $giasp;
		$this->arr_data[4] = $manhom;
		$this->arr_data[5] = $hinhanh;
		$this->arr_data[6] = $tomtat;
		$this->arr_data[7] = $noidung;
		$this->arr_data[8] = $trangthai;
	}
	//xây dựng các hàm thêm, sửa, xóa, truy vấn cơ bản
	public function Them()
	{
		//tạo đối tượng từ lớp clsDatabase, 
		//tương ứng với việc gọi hàm tạo clsDatabase() của lớp này để kết nối CSDL
		$db = new clsDatabase();
		//xây dựng câu lệnh cập nhật dữ liệu
		$str_sql = "INSERT INTO tbsanpham VALUES(?,?,?,?,?,?,?,?,?)";
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
		$str_sql = "UPDATE tbsanpham 
			SET masp=?, tensp=?, giasp=?, manhom=?, hinhanh=?, tomtat=?, noidung=?, trangthai=? 	WHERE id=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($this->arr_data[1],$this->arr_data[2],
		$this->arr_data[3],$this->arr_data[4],$this->arr_data[5], $this->arr_data[6],$this->arr_data[7],$this->arr_data[8],$this->arr_data[0]);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}
	public function Xoa($id)
	{
		$db = new clsDatabase();
		$str_sql = "DELETE FROM tbsanpham WHERE id=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($id);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}
	public function Truyvan_1_Banghi($tencot,$giatri)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT * FROM tbsanpham WHERE $tencot=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($giatri);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_1_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}
	public function Truyvan_Nhieu_Banghi($tencot,$giatri, $trangthai=2)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT * FROM tbsanpham WHERE $tencot=?";
		if($trangthai==1 || $trangthai==0)
			$str_sql .=  " AND trangthai = $trangthai";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($giatri);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_Toanbo_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}
	/*public function Truyvan_Toanbo_Banghi($trangthai=2,$trangthainsp=2)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT SP.*,NSP.tennhom FROM tbsanpham SP 
			INNER JOIN tbnhomsp NSP ON SP.manhom = nsp.manhom WHERE 1=1 ";
			
		if($trangthai==1 || $trangthai==0)
			$str_sql .=  " AND SP.trangthai = $trangthai";
		if($trangthainsp==1 || $trangthainsp==0)
			$str_sql .=  " AND NSP.trangthai = $trangthainsp";	
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array();
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_Toanbo_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}*/
	public function Timkiem($tukhoa="",$gia1="",$gia2="",$manhom=0,$trangthai=2,$trangthainsp=2)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT SP.*,NSP.tennhom FROM tbsanpham SP 
			INNER JOIN tbnhomsp NSP ON SP.manhom = nsp.manhom WHERE 1=1 ";
		//bổ sung xử lý điều kiện tìm kiếm cho mệnh đề WHERE
		$dieukien = "";
		//tạo điều kiện tìm theo từ khóa
		if($tukhoa!="")//nếu tìm theo từ khóa
		{
			$dieukien .= " AND tensp LIKE '%$tukhoa%' ";
		}
		//tạo điều kiện tìm theo giá
		if($gia1!=""&&is_numeric($gia1)&&$gia2!=""&&is_numeric($gia2))
		{
			$dieukien .= " AND (giasp >= $gia1 AND giasp<=$gia2) ";
		}
		else if($gia1!=""&&is_numeric($gia1)&&$gia2=="")
		{
			$dieukien .= " AND (giasp >= $gia1) ";
		}
		else if($gia2!=""&&is_numeric($gia2)&&$gia1=="")
		{
			$dieukien .= " AND (giasp <= $gia2) ";
		}
		//tạo điều kiện tìm theo nhóm sản phẩm
		if($manhom>0)//nếu tìm theo mã nhóm
		{
			//$dkNhom = " SP.manhom = $manhom ";
			//if($dieukien=="")//nếu chưa có đk tìm theo từ khóa
			//	$dieukien = " $dkNhom ";
			//else //ĐÃ CÓ ĐK TÌM THEO từ khóa ở trên
				$dieukien .= " AND SP.manhom = $manhom ";
		}
		
		//ghép điều kiện vào mệnh đề where
		if($dieukien!="")
			$str_sql .= " $dieukien";	
	    //bổ sung tìm kiếm theo trạng thái sản phẩm và nhóm sản phẩm
		if($trangthai==1 || $trangthai==0)
			$str_sql .=  " AND SP.trangthai = $trangthai";
		if($trangthainsp==1 || $trangthainsp==0)
			$str_sql .=  " AND NSP.trangthai = $trangthainsp";	
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array();
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_Toanbo_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}
	//đầu vào là tên cột và giá trị tìm kiếm
	//trả về id của sản phẩm có giá trị tìm trên cột đó
	public function getID($tencot,$giatri)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT * FROM tbsanpham WHERE $tencot=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($giatri);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
		{
			$this->arr_data = $db->Lay_1_Ban_Ghi_Dang_Mang();
			return $this->arr_data["id"];//trả về id của bản ghi tìm được
		}
		return -1;
	}
	//kiểm tra id sẩn phẩm có tồn tại trong chi tiết hóa đơn?
	public function KiemTraHoaDon($idsp)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT * FROM tbchitiethoadon WHERE idsp=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($idsp);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_1_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}
	public function Sua_Mot_Cot($tencot,$giatri,$id)
	{
		$db = new clsDatabase();
		//xây dựng câu lệnh cập nhật dữ liệu
		$str_sql = "UPDATE tbsanpham 
			SET $tencot=? WHERE id=?";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array($giatri,$id);
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		return $ketqua;
	}
	public function Lay_Banghi_Theo_DanhSach_ID($strDSID)
	{
		$db = new clsDatabase();
		//$str_sql = "SELECT * FROM tbsanpham WHERE $tencot=?";
		$str_sql  = "SELECT * FROM tbSanpham WHERE id in ($strDSID)";
		//tạo mảng chứa các giá trị cần gán cho các dấu ?
		$mang_giatri = array();
		//thực thi lệnh $str_sql với các giá trị tương ứng		
		$ketqua = $db->Thucthi_SQL($str_sql,$mang_giatri);
		if($ketqua>0)
			$this->arr_data = $db->Lay_Toanbo_Ban_Ghi_Dang_Mang();
		return $ketqua;
	}
	//đầu vào là tên cột và giá trị tìm kiếm
	//trả về id của sản phẩm có giá trị tìm trên cột đó
	public function Lay_1_cot($tencot,$tencot_tim,$giatri)
	{
		$db = new clsDatabase();
		$str_sql = "SELECT $tencot FROM tbsanpham WHERE $tencot_tim=?";
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