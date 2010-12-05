<?php
ob_start();
require("libraries/oop.php");
require("languages/lang_vn.php");
require_once("templates/default/top.php");
require_once("templates/default/left.php");
require_once("templates/default/info.php");
require_once("templates/default/right.php");
switch($_GET['module']){
	case "user":
	require("modules/user/controller.php");
	break;
	case "hanghoa":
	require("modules/hanghoa/controller.php");
	break;
}
require_once("templates/default/bottom.php");
ob_end_flush();
