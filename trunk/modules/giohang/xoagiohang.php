<?php
session_start();
$i = $_GET["id"];
$tt = $_SESSION['thanhtien'];
$tt = $tt - ($_SESSION['gia'.$i]*$_SESSION['soluong'.$i]);
$_SESSION['thanhtien'] = $tt;
for($i;$i<$_SESSION["tongsl"];$i++){
	$j=$i+1;
	$_SESSION["mahang".$i]=$_SESSION["mahang".$j];
	$_SESSION["tenhang".$i]=$_SESSION["tenhang".$j];
	$_SESSION["soluong".$i]=$_SESSION["soluong".$j];
	$_SESSION["gia".$i]=$_SESSION["gia".$j];

}
session_unregister("mahang".$_SESSION["tongsl"]);
session_unregister("tenhang".$_SESSION["tongsl"]);
session_unregister("soluong".$_SESSION["tongsl"]);
session_unregister("gia".$_SESSION["tongsl"]);
$_SESSION["tongsl"]--;
ob_clean();
header("location:index.php?module=giohang&act=xem");
?>
