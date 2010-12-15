<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/congty.php');
$stt=$_GET['stt'];
$loaihang=new LoaiHang;
$congty=new CongTy;
$data_loaihang=$loaihang->listloaihang();

$temp=0;
echo "<table width='730px'>
		<tr height='20px'>
			<td width='30px' align='center'>$stt</td>
			<td width='100px'>
			<select id='loaihangct' onchange=thaydoiloaihang(this.value,$stt)>";
			foreach($data_loaihang as $item_loaihang){
				if($temp==0)
					$temp=$item_loaihang['idLoaiHang'];
			?>
				<option value='<?php echo $item_loaihang['idLoaiHang'];?>'><?php echo $item_loaihang['TenLoai'];?></option>
			<?php
			}
echo "		</select>
			</td>
			<td width='100px' align='center'><div id='congtyhh$stt'><select id='congty$stt' >";
			$data_congty=$congty->listcongtytheoloai($temp);

			foreach($data_congty as $item_congty){
			?>
				<option value='<?php echo $item_congty['idCongTy'];?>'><?php echo $item_congty['TenCongTy'];?></option>
			<?php
			}			
			
			echo"	</div>
			</td>
			<td width='100px' align='center'><input type='text' size='20' id='hh$stt' value='tên hàng'/></td>
			<td width='100px' align='center'><input type='text' size='20' id='gia$stt' value='0' class='num'/></td>
			<td width='100px' align='center'><input type='text' size='20' id='soluong'value='0' disabled='disabled' class='num'/></td>
			<td width='100px' align='center'>Chi Tiết</td>
			
			<td width='50px' align='center'>";?><a href='#' onclick="themhanghoavaocsdl(document.getElementById('congty<?php echo $stt;?>').value,document.getElementById('hh<?php echo $stt;?>').value,document.getElementById('gia<?php echo $stt;?>').value)">Thêm</a>
			<?php
			echo "</td>
			<td width='50px' align='center'><a href='#'>Xóa</a></td>
		</tr>
	</table>
";
?>      