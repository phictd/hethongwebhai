<?php
session_start();
require_once('libraries/hanghoa.php');
//$cart=$_SESSION['cart'];
$idHang=$_GET['idHang'];
if($idHang == 0)
{
	unset($_SESSION['cart']);
	unset ($_SESSION['tongmathang']);
	unset ($_SESSION['thanhtien']);
}
else
{
	unset($_SESSION['cart'][$idHang]);
	$_SESSION['tongmathang']--;
	if($_SESSION['tongmathang'] == 0){
		unset ($_SESSION['tongmathang']);
		unset ($_SESSION['thanhtien']);
	}

	$a = new HangHoa;
	$data = $a->set_idHang($idHang);
	foreach($data as $row){
		$total = $_SESSION['thanhtien'] - ($_SESSION['cart'][$row['idHang']]*$row['Gia']);
	}
	$_SESSION['thanhtien'] = number_format($total);
}
ob_clean();
header("location:index.php?module=giohang&act=xem");
exit();
?>
