<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/donhang.php');
$a= new DonHang;
$id=$_GET['id'];
$ghichu=$_GET['ghichu'];


$a->set_idDonHang($id);
$a->set_GhiChu($ghichu);
$a->update_donhang();
echo "16";

	
?>