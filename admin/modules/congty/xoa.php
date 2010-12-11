<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/congty.php');
$a= new CongTy;
$id=$_GET['id'];
$a->set_idcongty($id);
$a->delete_congty();
echo '6';
?>
   