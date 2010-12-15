<?php
$ten=$_GET['ten'];
$lv=$_GET['lv'];
require_once('../../../libraries/oop.php');
require_once('../../../libraries/user.php');
require_once('../../../libraries/function.php');

	$a= new User;
	$a->set_user($ten);
	$a->set_level($lv);
	$a->set_pass('123456');
	$a->set_ngaydangky(date("Y-m-d",time()));
	$a->set_ngaysinh(date("Y-m-d",time()));
	if($a->get_user()!="")
		if($a->insert_user_admin()){
			echo "11";
		}else{
			echo "0";
		}
	else
		echo "0";
	

?>