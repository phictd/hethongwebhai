<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/function.php');

$a= new LoaiHang;
$id=$_GET['id'];
$a->set_idloai($id);
$data=$a->getdata();
$tenloai=$data[TenLoai];
$duongdan="../../../images/".locdau($tenloai);
if (is_dir($duongdan)){
		rmdir($duongdan);
	}
$a->delete_loaihang();
echo '5';
?>
   