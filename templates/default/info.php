<div id="info">
<?php
require_once('libraries/hanghoa.php');

$a= new HangHoa;
$data=$a->listhanghoa();
foreach($data as $item){
echo "$item[TenHang]<br/>";
echo "<img src=$item[UrlHinh] />";
}
?>
</div>