<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
$a= new LoaiHang;
$id=$_GET['id'];
$ten=$_GET['ten'];

$a->set_tenloai($ten);
$a->set_idloai($id);
$a->delete_loaihang();
echo "Welcome Link $id $ten";
?>