<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
$a= new LoaiHang;
$id=$_GET['id'];
$a->set_idloai($id);
$a->delete_loaihang();
echo '5';
?>
   