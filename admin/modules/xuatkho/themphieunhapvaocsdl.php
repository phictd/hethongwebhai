<?php
$idphieu=$_GET['idphieu'];
$ghichu=$_GET['ghichu'];	
require_once('../../../libraries/oop.php');
require_once('../../../libraries/phieunhap.php');
	$a= new PhieuNhap;
	$a->set_idphieunhap($idphieu);
	$a->set_ngaynhap(date("Y-m-d",time()));	
	$a->set_tongtien(0);
	$a->set_ghichu($ghichu);
	$a->insert_phieunhap();
	echo "15";
	


?>