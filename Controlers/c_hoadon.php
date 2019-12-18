<?PHP
if($_SESSION["loaiquantri"]!=1)
	die("Không có quyền vào mục này");
	
require_once("Models/clsHoadon.php");
require_once("Models/clsChitietHoadon.php");
$cmd ="";
if(isset($_REQUEST["cmd"]))
	$cmd = $_REQUEST["cmd"];
switch($cmd)
{
	case "sua":
		break;
	case "xl_sua":
		require("Controlers/c_hoadon_xlSua.php");
		break;	
	case "xoa":
		require("Controlers/c_hoadon_xlXoa.php");
		break;	
	case "chitiethd":
		$rq_mahd = "";
		if(isset($_REQUEST["mahd"]))
		{
			$rq_mahd=$_REQUEST["mahd"];
			$obj = new clsChitietHoadon();
			$ketqua = $obj->Truyvan_MaHD($rq_mahd);
			//tính tổng tiền của cả hóa đơn
			$hoadon = new clsHoadon();
	  		$tongtienhd = $hoadon->TongTien($rq_mahd);
			//lấy thông tin chung của hóa đơn
			$kq_hoadon = $hoadon->Truyvan_1_Banghi("mahd",$rq_mahd);
			
			require("Views/v_hoadon_chitiet.php");
		}
		break;	
	default:
		$obj = new clsHoadon();
		$ketqua = $obj->Truyvan_Toanbo_Banghi("DESC");
		require("Views/v_hoadon_danhsach.php");	
}	
?>