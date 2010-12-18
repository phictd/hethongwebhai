<?php
switch($_GET['act']){
	case "lhhloai":
	require("modules/hanghoa/listhanghoatheoloai.php");
	break;		
	case "chitiet":
	require("modules/hanghoa/chitiet.php");
	break;	
	
}