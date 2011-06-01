<?php
ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/phieuxuat.php');
require_once('../../../libraries/chitietphieuxuat.php');
$px= new PhieuXuat;
$ct= new ChiTietPhieuXuat;
$id=$_GET['id'];
$ct->set_idphieuxuat($id);
$ct->delete_allchitietinphieuxuat();
$px->set_idphieuxuat($id);
$px->delete_phieuxuat();
echo '19';
?>
   