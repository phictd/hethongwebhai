<?php
ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/donhang.php');
require_once('../../../libraries/chitietdonhang.php');
$dh= new DonHang;
$ct= new ChiTietDonHang;
$id=$_GET['id'];
$ct->set_idDonHang($id);
$ct->Xoa_tatcaChitietDonHang();
$dh->set_idDonHang($id);
$dh->XoaDonHang();
echo '17';
?>
   