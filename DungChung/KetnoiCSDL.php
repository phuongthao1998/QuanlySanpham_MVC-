<?php
try{
$pdo_conn = new PDO("mysql:host=localhost;dbname=websanpham2;charset=utf8","root","");
}
catch(PDOException $e){
	die("<h3>Lỗi Kết nối CSDL: " . $e->getMessage() ."</h3>");
}
?>
