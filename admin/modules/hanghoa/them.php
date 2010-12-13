<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/congty.php');
$stt=$_GET['stt'];
$loaihang=new LoaiHang;
$congty=new CongTy;
$data_congty=$congty->listcongty();
$data_loaihang=$loaihang->listloaihang();
echo "<table width='800px'>
		<tr height='20px'>
			<td width='30px' align='center'>$stt</td>
			<td width='100px'>
			<select id='loaihanghoa'>";
			foreach($data_loaihang as $item_loaihang){
			?>
				<option value='<?php echo $item_loaihang['idLoaiHang'];?>'><?php echo $item_loaihang['TenLoai'];?></option>
			<?php
			}
echo "		</select>
			</td>
			<td width='100px' align='center'><input type='text' size='20' id='them_ten' value='congty'/></td>
			<td width='100px' align='center'><input type='text' size='20' id='them_ten' value='hag hoa'/></td>
			<td width='100px' align='center'><input type='text' size='20' id='them_ten' value='gia'/></td>
			<td width='100px' align='center'><input type='text' size='20' id='them_ten'value='solg'/></td>
			<td width='100px' align='center'>Hình</td>
			<td width='70px' align='center'>Mô Tả</td>
			
			<td width='50px' align='center'>";?><a href='#' onclick="themcongtyvaocsdl(document.getElementById('loaihanghoa').value,document.getElementById('them_ten').value)">Thêm</a>
			<?php
			echo "</td>
			<td width='50px' align='center'><a href='#'>Xóa</a></td>
		</tr>
	</table>
";
?>      