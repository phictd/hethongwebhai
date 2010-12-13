<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/hanghoa.php');
$a= new HangHoa;
$id=$_GET['id'];
$a->set_idhang($id);
$a->delete_hanghoa();
echo '8';
?>
   