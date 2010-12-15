<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/user.php');
$a= new User;
$user=$_GET['user'];
$lv=$_GET['level'];

$a->set_user($user);
$a->set_level($lv);
$a->update_lv();
	echo "10";
?>