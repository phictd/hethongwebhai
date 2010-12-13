<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/hanghoa.php');
$a= new HangHoa;
$id=$_GET['id'];
$congty=$_GET['congty'];
$ten=$_GET['ten'];
$gia=$_GET['gia'];

$a->set_idhang($id);
$a->set_idcongty($congty);
$a->set_tenhang($ten);
$a->set_gia($gia);

if($a->update_hanghoa()){
	echo "7";
}else
	echo "0";
	
?>