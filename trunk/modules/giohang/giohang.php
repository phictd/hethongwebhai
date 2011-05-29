<?php
session_start();
require_once('libraries/hanghoa.php');
$idhang = $_GET['ma'];
$slhang = $_GET['slhang'];
$hang = new HangHoa();
$hang->set_idhang($idhang);
$datahang = $hang->getHang();
if(isset($_GET["ma"])) {
	$kt=0;
	for($i=1;$i<=$_SESSION["tongsl"];$i++){
		if ($_GET["ma"]==$_SESSION["idhang".$i]){
			$kt=1;
            $_SESSION['thanhtien'] +=$_SESSION['gia'.$i];
			$_SESSION["soluong".$i]=$_SESSION['soluong'.$i]+1;
			break;
		}
	}
	if ($kt==0){
		if($datahang != 0){
			$_SESSION['tongsl']++;
			$i = $_SESSION['tongsl'];
			session_register("idhang".$i);
			$_SESSION["idhang".$i] = $datahang['idHang'];
			session_register("tenhang".$i);
			$_SESSION['tenhang'.$i] = $datahang['TenHang'];
			session_register("gia".$i);
			$_SESSION["gia".$i] = $datahang['Gia'];
			session_register("soluong".$i);
			$_SESSION["soluong".$i] = $slhang;
			$_SESSION['thanhtien'] = $_SESSION['thanhtien']+($_SESSION['gia'.$i]*$_SESSION['soluong'.$i]);
		}
	}
}
ob_clean();
header("location:index.php");
?>