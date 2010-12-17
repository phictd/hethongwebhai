<?php
//ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/congty.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/hanghoa.php');
require_once('../../../libraries/chitietphieunhap.php');

$stt=$_GET['stt'];

$loaihang=new LoaiHang;
$congty=new CongTy;
$data_loaihang=$loaihang->listloaihang();
echo "<form action='chitiet.php?id=$idphieunhap' method='post'>
		<table align='center'  width='600px' id='tableloaihang' >
		<tr height='20px'>
			<td width='50px' align='center'>$stt</td>";
		echo "<td width='150px' align='center'><select id='iloaihang' name='loaihang' onchange=thaydoiloaihang(this.value)>";
		$idloai=0;
			foreach($data_loaihang as $item_loaihang){
				if($idloai==0){
					$idloai=$item_loaihang[idLoaiHang];
				}
				echo "<option value='$item_loaihang[idLoaiHang]'>$item_loaihang[TenLoai]</option>";	
			}			
		echo "</select></td>";
		
		echo "<td width='150px' align='center'><div id='congtyhh'><select id='icongty' name='congty' onchange=thaydoicongty(this.value)>";	
			$idcongty=0;	
			$loaihang->set_idloai($idloai);
			$data_congty=$loaihang->listcongty();
			foreach($data_congty as $item_congty){
				if($idcongty==0){
					$idcongty=$item_congty[idCongTy];
				}
				echo "<option value='$item_congty[idCongTy]'>$item_congty[TenCongTy]</option>";	
			}			
		echo "</select></div></td>";
		
		echo "<td width='150px' align='center'><div id='hanghoahh'><select id='ihanghoa' name='hanghoa' >";			
			$congty->set_idcongty($idcongty);
			$data_hang=$congty->listhanghoa();
			foreach($data_hang as $item_hang){
				echo "<option value='$item_hang[idHang]'>$item_hang[TenHang]</option>";	
			}			
		echo "</select></div></td>";
		
		echo"			
			
			<td width='100px' align='center'><input type='text' size='10' id='isoluong' name='soluong'/></td>
			";?>
						
		</tr>
	</table>
    <div align="center"><input type="submit" value="Thêm" name="ok" /></div>
  </form>

   
   