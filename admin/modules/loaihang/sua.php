<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
$a= new LoaiHang;
$id=$_GET['id'];
$ten=$_GET['ten'];

$a->set_tenloai($ten);
$a->set_idloai($id);
if($a->update_loaihang()){
	echo "2";
}else
	echo "0";
	
?>