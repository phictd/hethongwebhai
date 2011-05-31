<?php
ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/congty.php');

$idloai=$_GET['idloai'];

$t= new CongTy;
$data_t=$t->listcongtytheoloai($idloai);
$tam=0;
foreach($data_t as $item_t){
	if($tam==0)
		$tam=$item_t['idCongTy'];
}
echo $tam;
?>
