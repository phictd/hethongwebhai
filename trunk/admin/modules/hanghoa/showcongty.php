<?php
ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/congty.php');
$stt=$_GET['stt'];
$idloai=$_GET['idloai'];
$loaihang=new LoaiHang;
$congty=new CongTy;
$data_congty=$congty->listcongtytheoloai($idloai);
echo "<select id='congty".$stt."'>";
		foreach($data_congty as $item_congty){
				?>
					<option value='<?php echo $item_congty['idCongTy'];?>'><?php echo $item_congty['TenCongTy'];?></option> <?php	}	
echo" </select>
";
?>      