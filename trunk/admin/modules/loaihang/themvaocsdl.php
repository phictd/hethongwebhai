<?php
$tenloai=$_GET['tenloai'];	
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/function.php');

	$a= new LoaiHang;
	$a->set_tenloai($tenloai);
	$duongdan="../../../images/".locdau($tenloai);
	if (!is_dir($duongdan)){
		mkdir($duongdan,0700);
	}
	if($a->insert_loaihang()){
		echo "1";
	}else{
		echo "0";
	}
	

?>