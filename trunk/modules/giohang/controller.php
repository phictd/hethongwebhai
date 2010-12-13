<?php
require("libraries/donhang.php");
//require("libraries/chitietdonhang.php");
switch($_GET['act']){
    case "them":
        require("modules/giohang/giohang.php");
        break;
        case "xoa":
        require("modules/giohang/xoagiohang.php");
        break;
        case "xem":
        require("modules/giohang/xemgiohang.php");
        break;
        case "capnhat":
        require("modules/giohang/capnhatdonhang.php");
        break;
        case "dathang":
        require("modules/giohang/dathang.php");
        break;
}
?>
