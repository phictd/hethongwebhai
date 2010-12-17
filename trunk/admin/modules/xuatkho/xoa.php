<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/phieunhap.php');
$a= new PhieuNhap;
$id=$_GET['id'];
$a->set_idphieunhap($id);
$a->delete_phieunhap();
echo '14';
?>
   