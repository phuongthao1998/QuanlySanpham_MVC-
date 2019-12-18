<?PHP
require_once("Models/clsNhomSP.php");
$cmd ="";
if(isset($_REQUEST["cmd"]))
	$cmd = $_REQUEST["cmd"];
switch($cmd)
{
	case "them":
		require("Views/v_nhomsp_them.php");
		break;
	case "sua":
		//lấy mã nhóm sp cần sửa
		$manhom = $_REQUEST["manhom"];
		//tạo đối tượng nhomsp và lấy từ csdl
		$obj = new clsNhomSP();
		$ketqua = $obj->Truyvan_1_Banghi("manhom",$manhom);
		require("Views/v_nhomsp_sua.php");
		break;
	case "xl_them":
		require("Controlers/c_nhomsp_xlThem.php");
		break;
	case "xl_sua":
		require("Controlers/c_nhomsp_xlSua.php");
		break;	
	case "xoa":
		require("Controlers/c_nhomsp_xlXoa.php");
		break;	
	default:
		//tạo đối tượng nhomsp và lấy các nhóm sp từ csdl
		$obj = new clsNhomSP();
		$ketqua = $obj->Truyvan_Toanbo_Banghi();
		require("Views/v_nhomsp_danhsach.php");	
}	
?>