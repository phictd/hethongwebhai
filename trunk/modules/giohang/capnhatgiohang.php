<?php
session_start();
if(isset($_POST['capnhat']))
{
	foreach($_POST['qty'] as $key=>$value)
	{
		if( ($value == 0) and (is_numeric($value)))
		{
			unset ($_SESSION['cart'][$key]);
		}
		elseif(($value > 0) and (is_numeric($value)))
		{
			$_SESSION['cart'][$key]=$value;
		}
	}
}

ob_clean();
header("location:index.php?module=giohang&act=xem");
exit();
?>
