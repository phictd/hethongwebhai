<?php
ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/congty.php');
$idloai=$_GET['idloai'];
$loaihang=new LoaiHang;
$loaihang->set_idloai($idloai);
$data_congty=$loaihang->listcongty();
$idcongty=0;
echo "<select id='congty' onchange=thaydoicongty(this.value)>";
		foreach($data_congty as $item_congty){
				if($idcongty==0){
					$idcongty=$item_congty[idCongTy];
					echo "<script language='javascript'>layidcongty($idcongty);</script>";
				}?>
					<option value='<?php echo $item_congty['idCongTy'];?>'><?php echo $item_congty['TenCongTy'];?></option> <?php	}	
echo" </select>
";
?>      