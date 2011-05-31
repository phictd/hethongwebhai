<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/chitietdonhang.php');
$a= new ChiTietDonHang;
$iddonhang=$_GET['iddonhang'];
$idhang=$_GET['idhang'];
$soluong=$_GET['soluong'];

$a->set_idDonHang($iddonhang);
$a->set_idHang($idhang);
$a->set_SoLuong($soluong);

if($a->updateChiTiet()){
	echo "$iddonhang";
}else
	echo "0";
	
?>