<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/donhang.php');
$a= new DonHang;
$id=$_GET['id'];
$a->set_idDonHang($id);
$a->XoaDonHang();
echo '17';
?>
   