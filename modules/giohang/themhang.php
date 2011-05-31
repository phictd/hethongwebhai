<?php
/* =================================
// Shopping Cart system  			\\
// Coded by Mr Kenny				\\
// Website: www.qhonline.info		\\
// Email: whitelionvn@gmail.com		\\
// Phone: 0903087580				\\
=====================================*/
session_start();
$id=$_GET['data'];
require_once('../../libraries/oop.php');
require_once('../../libraries/hanghoa.php');
if(isset($_SESSION['cart'][$id]))
{
	$qty = $_SESSION['cart'][$id] + 1;
}
else
{
	$qty=1;
}
$_SESSION['cart'][$id]=$qty;
$ok=1;

	foreach($_SESSION['cart'] as $k=>$v)
		{
			if(isset($k))
			{
			$ok=2;
			}
		}
	
	if ($ok == 2){
	
		$hang = new HangHoa;
			foreach($_SESSION['cart'] as $key=>$value){
				$hang->set_idhang($key);
				$dataid[] = $hang->getHang();
			}

    	foreach($dataid as $data){
			foreach($data as $rowid){
				$total+=$_SESSION['cart'][$rowid['idHang']]*$rowid['Gia'];
			}
		}
		
		$items = $_SESSION['cart'];
		$_SESSION['thanhtien'] = number_format($total);
		
		$_SESSION['tongmathang'] = count($items);
		echo $_SESSION['tongmathang']." Mặt hàng <br />";
		echo "<span id='border_cart'></span>";
		echo "Tổng: <span id='price'>".$_SESSION['thanhtien']." VND</span>";
		

	}else{
		echo '0';	
	}
?>
