<?php
$idloai=$_GET['idloai'];	
$tencongty=$_GET['tencongty'];	
require_once('../../../libraries/oop.php');
require_once('../../../libraries/congty.php');
	$a= new CongTy;
	$a->set_idloaihang($idloai);
	$a->set_tencongty($tencongty);
	
	echo $idloai;
	echo $a->get_idloaihang();
	echo $a->get_tencongty();
	if($a->insert_congty()){
		echo "3";
	}else{
		echo "0";
	}
	

?>