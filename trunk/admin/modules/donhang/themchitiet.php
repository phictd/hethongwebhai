<?php
//ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/congty.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/hanghoa.php');
require_once('../../../libraries/chitietdonhang.php');

function layidcongty($idl){
	$lhang=new LoaiHang;
	$cty=new CongTy;
	
	$lhang->set_idloai($idl);
	$data_cty=$lhang->listcongty();
	return $data_cty[0]['idCongTy'];	
}

function laydatacongty($idl){
	$lhang=new LoaiHang;
	$cty=new CongTy;	
	$lhang->set_idloai($idl);	
	return $lhang->listcongty();
}
	
function laydatahanghoa($idct){
	$ct=new CongTy;
	$ct->set_idcongty($idct);
	return $ct->listhanghoa();
	
}

$stt=$_GET['stt'];
$iddonhang=$_GET['id'];

$loaihang=new LoaiHang;
$congty=new CongTy;
$data_loaihang=$loaihang->listloaihang();
$idloai=$data_loaihang[0]['idLoaiHang'];

$data_congty=laydatacongty($idloai);
$idcongty=$data_congty[0]['idCongTy'];

echo "<form action='chitiet.php?id=$iddonhang' method='post'>
		<table align='center'  width='600px' id='tableloaihang' >
		<tr height='20px'>
			<td width='50px' align='center'>$stt</td>";
		echo "<td width='150px' align='center'>
		
		<select id='iloaihang' name='loaihang' onchange='thaydoiloaihang(this.value)'>";		
			foreach($data_loaihang as $item_loaihang){				
				echo "<option value='$item_loaihang[idLoaiHang]'>$item_loaihang[TenLoai]</option>";	
			}			
		echo "
		</select>
		
		</td>";
		
		echo "<td width='150px' align='center'>		
		
		<select id='icongty' name='congty' onchange=thaydoicongty(this.value)>";
			echo "<option value='-1'>----Chọn----</option>";				
			foreach($data_congty as $item_congty){				
				echo "<option value='$item_congty[idCongTy]'>$item_congty[TenCongTy]</option>";	
			}			
		echo "
		</select>
		
		</td>";
		
		echo "<td width='150px' align='center'>
		
		<select id='ihanghoa' name='hanghoa' >";	
			echo "<option value='-1'>----Chọn----</option>";				
			/*$data_hang=laydatahanghoa($idcongty);
			foreach($data_hang as $item_hang){
				echo "<option value='$item_hang[idHang]'>$item_hang[TenHang]</option>";	
			}	*/		
		echo "
		</select></td>";
		
		echo"			
			
			<td width='100px' align='center'><input type='text' size='10' id='isoluong' name='soluong'/></td>
			";?>
						
		</tr>
	</table>
    <div align="center"><input type="submit" value="Thêm" name="ok" /></div>
  </form>

   
   