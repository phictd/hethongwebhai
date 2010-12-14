<?php
session_start();
require("libraries/user.php");
if(isset($_POST['ok'])){
	if($_POST['txtuser'] == NULL){
		echo "Chưa nhập tên đăng nhập <br />";
	}else{
		$u=$_POST['txtuser'];
	}
	if($_POST['txtpass'] == NULL){
		echo "Chưa nhập mật khẩu <br />";
	}else{
		$p=$_POST['txtpass'];
	}
	$login = new User;
	$login->set_user($u);
	$login->set_pass($p);
	$data1=$login->check_login();
	if($login->check_login()==FALSE){
		echo "Đăng nhập thất bại";
	}else{
			foreach($data1 as $user1){
			$_SESSION['username']=$user1[Username];
			$_SESSION['level']=$user1[Level];
			}
			if($_GET['co']==2)
				header("location:index.php?module=giohang&act=xem");
			else
				header("location:index.php");
			exit();
	}
}
?>