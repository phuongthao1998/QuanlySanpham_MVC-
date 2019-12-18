<?php
require_once("Models/clsSanpham.php");
$obj = new clsSanpham();
//$ketqua = $obj->Truyvan_Toanbo_Banghi(1,1);
$ketqua = $obj->Timkiem("","","",0,1,1);
require("Views_Home/v_Home.php");	
?>			
           
