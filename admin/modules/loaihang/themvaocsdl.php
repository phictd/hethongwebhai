<?php
$tenloai=$_GET['tenloai'];	
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
	$a= new LoaiHang;
	$a->set_tenloai($tenloai);
	if($a->insert_loaihang()){
		echo "1";
	}else{
		echo "0";
	}
	

?>