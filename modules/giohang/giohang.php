<?php
session_start();
require_once('libraries/hanghoa.php');
$idHang = $_GET['ma'];
$slhang = $_GET['slhang'];
$hang = new HangHoa();
$hang->set_idhang($idHang);
$datahang = $hang->getHang();
if(isset($_GET["ma"])) {
	$kt=0;
	for($i=1;$i<=$_SESSION["tongsl"];$i++){
		if ($_GET["ma"]==$_SESSION["idHang".$i]){
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
			
			$_SESSION["idHang".$i] = $datahang['idHang'];
			
			$_SESSION['tenhang'.$i] = $datahang['TenHang'];
		
			$_SESSION["gia".$i] = $datahang['Gia'];
	
			$_SESSION["soluong".$i] = $slhang;
			$_SESSION['thanhtien'] = $_SESSION['thanhtien']+($_SESSION['gia'.$i]*$_SESSION['soluong'.$i]);
		}
	}
}
ob_clean();
header("location:index.php");
?>