<?php

require_once('../../../libraries/oop.php');
require_once('../../../libraries/hanghoa.php');
$idcongty=$_GET['idcongty'];
$tenhang=$_GET['tenhang'];
$gia=$_GET['gia'];
		$a= new HangHoa;
	$a->set_idcongty($idcongty);
	$a->set_tenhang($tenhang);
	$a->set_gia($gia);	
	$a->set_ngaycapnhat(time());
	/*$sql="insert into hanghoa(idCongTy,TenHang,NgayCapNhat,Gia) values('".$a->get_idcongty()."', '".$a->get_tenhang()."', '".$a->get_ngaycapnhat()."', '".$a->get_gia()."')<br/>";
	$sql1="select * from hanghoa where TenHang='".$a->get_tenhang()."' and idCongTy='".$a->get_idcongty()."'";
	
	echo $sql;
	echo $sql1;*/

	if($a->insert_hanghoatruoc())
		echo '9';
	else 
		echo '0';
	
?>