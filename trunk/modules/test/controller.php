<?php

switch($_GET['act']){
	case "simso":
	require("modules/test/simso.php");
	break;
	case"gioithieu":
	require("modules/test/gioithieu.php");
	break;
	case"tuyendung":
	require("modules/test/tuyendung.php");
	break;
	case"tintuc":
	require("modules/test/tintuc.php");
	break;	
	case"lienhe":	
	require("modules/test/lienhe.php");
	break;	
}