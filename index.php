<?php
ob_start();
require("libraries/oop.php");
require("languages/lang_vn.php");
require_once("templates/default/top.php");
require_once("templates/default/left.php");
if(isset($_GET['module'])){
switch($_GET['module']){
	case "user":
            require("modules/user/controller.php");
            break;
	case "hanghoa":
         require("modules/hanghoa/controller.php");
    	    break;
    case "giohang":
        require("modules/giohang/controller.php");
          break;
	case"test":
		 require("modules/test/controller.php");
	    break;
	case"tim":
		require("modules/tim/controller.php");
	    break;
}
}else{
		require("modules/hanghoa/listhanghoa.php");
}

require_once("templates/default/right.php");
require_once("templates/default/bottom.php");
ob_end_flush();
