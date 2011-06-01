<?php
ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/phieunhap.php');
require_once('../../../libraries/chitietphieunhap.php');
$pn= new PhieuNhap;
$ct= new ChiTietPhieuNhap;
$id=$_GET['id'];
$ct->set_idphieunhap($id);
$ct->delete_allchitietinphieunhap();
$pn>set_idphieunhap($id);
$pn->delete_phieunhap();
echo '14';
?>
   