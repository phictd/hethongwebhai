<?php
ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/congty.php');
require_once('../../../libraries/hanghoa.php');
$idcongty=$_GET['idcongty'];
$congty=new CongTy;
$congty->set_idcongty($idcongty);
$data_hang=$congty->listhanghoa();

echo "<select id='hanghoa' >";
		foreach($data_hang as $item_hang){
				?>
					<option value='<?php echo $item_hang['idHang'];?>'><?php echo $item_hang['TenHang'];?></option> <?php	}	
echo" </select>
";
?>      