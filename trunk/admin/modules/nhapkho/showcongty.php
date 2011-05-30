<?php
ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/congty.php');
$idloai=$_GET['idloai'];
$loaihang=new LoaiHang;
$loaihang->set_idloai($idloai);
$data_congty=$loaihang->listcongty();


		foreach($data_congty as $item_congty){				
				?>
					<option value='<?php echo $item_congty['idCongTy'];?>'><?php echo $item_congty['TenCongTy'];?></option> <?php	}	

?>      