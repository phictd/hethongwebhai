<?php
ob_start();
require("../libraries/oop.php");
require("../languages/lang_vn.php");
require_once("templates/default/top.php");
require_once("templates/default/left.php");
switch($_GET['module']){
	case 'congty':	echo "<script language='javascript'>list('congty')</script>";	break;
	case 'hanghoa':	echo "<script language='javascript'>list('hanghoa')</script>";	break;
	case 'user':	echo "<script language='javascript'>list('user')</script>";	break;
	case 'nhapkho':echo "<script language='javascript'>list('nhapkho')</script>";	break;
	case 'xuatkho':echo "<script language='javascript'>list('xuatkho')</script>";	break;
	case 'donhang':echo "<script language='javascript'>list('donhang')</script>";	break;
	default: 		echo "<script language='javascript'>list('loaihang')</script>";break;
}
	

?>
<div id="ketqua" align="center"></div>
<?php
require_once("templates/default/bottom.php");
ob_end_flush();
?>