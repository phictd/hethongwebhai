<?php
session_start();
require("libraries/user.php");
if(isset($_POST['ok'])){
	if($_POST['txtuser'] == NULL){
		echo "<div align='center' style='margin:10px 0px 5px 0px;'><font size='+1' color='#FF0033'>Chưa gõ tên đăng nhập</font></div><br />";
	}else{
		$u=$_POST['txtuser'];
	}
	if($_POST['txtpass'] == NULL){
		echo "<div align='center' style='margin:10px 0px 5px 0px;'><font size='+1' color='#FF0033'>Chưa nhập mật khẩu</font></div>";
	}else{
		$p=$_POST['txtpass'];
	}
	if($u && $p){
		$login = new User;
		$login->set_user($u);
		$login->set_pass($p);
		$data1=$login->check_login();
		if($login->check_login()==FALSE){
			echo "<div align='center' style='margin:10px;'><font size='+1' color='#FF0033'>Sai tên đăng nhập hoặc mật khẩu</font></div>";
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
}
?>