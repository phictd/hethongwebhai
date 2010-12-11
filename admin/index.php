<?php
ob_start();
require("../libraries/oop.php");
require("../languages/lang_vn.php");
require_once("templates/default/top.php");
require_once("templates/default/left.php");
?>
<div id="ketqua" align="center">Vùng xử lý</div>
<?php
require_once("templates/default/bottom.php");
ob_end_flush();
?>