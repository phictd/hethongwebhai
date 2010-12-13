<?php
session_start();
for($i=1;$i<=$_SESSION["tongsl"];$i++){
	if ($_POST["C".$i]=="") {
		$_SESSION["soluong".$i]=1;
	}else
	{
	$_SESSION["soluong".$i]=$_POST["C".$i];
	}
}
ob_clean();
header("location:index.php?module=giohang&act=xem");
?>
