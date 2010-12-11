<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/congty.php');
$a= new CongTy;
$id=$_GET['id'];
$loai=$_GET['loai'];
$ten=$_GET['ten'];

$a->set_tencongty($ten);
$a->set_idcongty($id);
$a->set_idloaihang($loai);
if($a->update_congty()){
	echo "4";
}else
	echo "0";
	
?>