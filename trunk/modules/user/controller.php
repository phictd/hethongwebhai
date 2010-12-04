<?php
require("libraries/user.php");
switch($_GET['act']){
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
}