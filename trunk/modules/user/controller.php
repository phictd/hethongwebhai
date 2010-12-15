<?php
switch($_GET['act']){
	case "check_login":
	require("modules/user/check_login.php");
	break;
	case "logout":
	require("modules/user/logout.php");
	break;
	case "register":
	require("modules/user/register.php");
	break;
	case "add":
	require("modules/user/add.php");
	break;
	case "list":
	require("modules/user/list.php");
	break;
	case "edit":
	require("modules/user/edit.php");
	break;
	case "del":
	require("modules/user/del.php");
	break;			
	case "login":
	require("modules/user/login.php");
	break;			
}