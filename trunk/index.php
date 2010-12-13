<?php
ob_start();
require("libraries/oop.php");
require("languages/lang_vn.php");
require_once("templates/default/top.php");
require_once("templates/default/left.php");


switch($_GET['module']){
	case "user":
            require("modules/user/login.php");
            break;
        case "hoakieng":
            require("modules/hoakieng/controller.php");
            break;
        case "giohang":
            require("modules/giohang/controller.php");
            break;
    default:
		require_once("templates/default/info.php");
}

require_once("templates/default/right.php");
require_once("templates/default/bottom.php");
ob_end_flush();
