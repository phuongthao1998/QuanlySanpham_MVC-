<?PHP
require_once("Models/clsSanpham.php");
require_once("Models/clsNhomSP.php");
$cmd ="";
if(isset($_REQUEST["cmd"]))
	$cmd = $_REQUEST["cmd"];
switch($cmd)
{
	case "them":
		$obj_list = new clsNhomSP();//dùng để tạo option chọn nhóm sp
        $kq_list = $obj_list->Truyvan_Toanbo_Banghi();
		require("Views/v_sanpham_them.php");
		break;
	case "sua":
		//lấy id cần sửa
		$id = $_REQUEST["id"];
		
		$obj_list = new clsNhomSP();//dùng để tạo option chọn nhóm sp
        $kq_list = $obj_list->Truyvan_Toanbo_Banghi();
		//tạo đối tượng sanpham và lấy từ csdl
		$obj = new clsSanpham();
		$ketqua = $obj->Truyvan_1_Banghi("id",$id);
		require("Views/v_sanpham_sua.php");
		break;
	case "xl_them":
		require("Controlers/c_sanpham_xlThem.php");
		break;
	case "xl_sua":
		require("Controlers/c_sanpham_xlSua.php");
		break;	
	case "xoa":
		require("Controlers/c_sanpham_xlXoa.php");
		break;	
	default:
		$tukhoa = "";
		$manhom = 0;
		$gia1 = "";
		$gia2 = "";
		if(isset($_REQUEST["bSubmit"]))
		{
			$tukhoa = $_REQUEST["tTukhoa"];
			$gia1 = $_REQUEST["tGia1"];
			$gia2 = $_REQUEST["tGia2"];
			$manhom = $_REQUEST["sMaNhom"];
		}
		$obj_list = new clsNhomSP();//dùng để tạo option chọn nhóm sp
		$kq_list = $obj_list->Truyvan_Toanbo_Banghi();
		//tạo đối tượng sanpham và lấy các nhóm sp từ csdl
		$obj = new clsSanpham();
		$ketqua = $obj->Timkiem($tukhoa,$gia1,$gia2,$manhom);
		require("Views/v_sanpham_danhsach.php");	
}	
?>