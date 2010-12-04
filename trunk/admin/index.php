<?php
ob_start();
require("../libraries/oop.php");
require("../languages/lang_vn.php");
require_once("templates/default/top.php");
require_once("templates/default/left.php");
switch($_GET['module']){
	case "loaihang":
	require("modules/loaihang/controller.php");
	break;
	case "congty":
	require("modules/congty/controller.php");
	break;
	case "hanghoa":
	require("modules/hanghoa/controller.php");
	break;case "xuatkho":
	require("modules/xuatkho/controller.php");
	break;
	case "nhapkho":
	require("modules/nhapkho/controller.php");
	break;
	case "donhang":
	require("modules/donhang/controller.php");
	break;
	case "user":
	require("modules/user/controller.php");
	break;
	
}
require_once("templates/default/bottom.php");
ob_end_flush();
?>