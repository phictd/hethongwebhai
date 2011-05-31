<?php
require("libraries/donhang.php");
//require("libraries/chitietdonhang.php");
switch($_GET['act']){
         case "xoa":
        require("modules/giohang/xoagiohang.php");
        break;
        case "xem":
        require("modules/giohang/xemgiohang.php");
        break;
        case "capnhat":
        require("modules/giohang/capnhatgiohang.php");
        break;
        case "dathang":
        require("modules/giohang/dathang.php");
        break;
}
?>
