<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/phieunhap.php');
$a= new PhieuNhap;
$id=$_GET['id'];
$ghichu=$_GET['ghichu'];


$a->set_idphieunhap($id);
$a->set_ghichu($ghichu);
$a->update_phieunhap();
echo "13";

	
?>