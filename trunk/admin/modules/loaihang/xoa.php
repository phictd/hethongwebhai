<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
$a= new LoaiHang;
$id=$_GET['id'];

$a->set_idloai($id);
if($a->delete_loaihang()){
	echo "1";
}else{
	echo "0";
}


?>
    </table>
    </div>
</div> 