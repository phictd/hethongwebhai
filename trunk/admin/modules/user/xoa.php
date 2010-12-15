<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/user.php');
$a=new User;
$user=$_GET['id'];
$a->set_user($user);
$a->delete_user();
echo '12';
?>
   