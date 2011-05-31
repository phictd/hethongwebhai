<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/chitietdonhang.php');
$a= new ChiTietDonHang;
$iddonhang=$_GET['iddonhang'];
$idhang=$_GET['idhang'];

$a->set_idDonHang($iddonhang);
$a->set_idHang($idhang);

$a->XoaChitietDonHang();
	echo "$iddonhang";

	
?>