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
			header("location:index.php");
			exit();
	}
}

echo "<div>";

echo "<form action='index.php?module=user&act=check_login' method='post'>";
          echo " <fieldset>";
           echo "<legend>Đăng nhập</legend>";
         echo "  <label>Tên đăng nhập:</label> <br/><input type='text' name='txtuser' size='10' /><br />";
         echo "  <label>Mật khẩu:</label><br/> <input type='password' name='txtpass' size='10' /><br />";
         echo "  <input type='submit' name='ok' value='Đăng nhập' />";
          echo " <a href='index.php?module=user&act=register'><input type='submit' name='dk' value='Đăng ký' /></a>";
           echo "</fieldset>";
           echo " </form>";
echo "</div>";
?>