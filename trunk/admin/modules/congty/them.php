<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
$stt=$_GET['stt'];
$loaihang=new LoaiHang;
$data_loaihang=$loaihang->listloaihang();
echo "<table width='600px'>
		<tr height='20px'>
			<td width='100px' align='center'>$stt</td>
			<td width='100px'><select id='loaihanghoa'>";
			foreach($data_loaihang as $item_loaihang){
			?>
				<option value='<?php echo $item_loaihang['idLoaiHang'];?>'><?php echo $item_loaihang['TenLoai'];?></option>
			<?php
			}
echo "		</select></td>
			<td width='200px' align='center'><input type='text' size='25' id='them_ten'/></td>
			<td width='100px' align='center'>";?><a href='#' onclick="themcongtyvaocsdl(document.getElementById('loaihanghoa').value,document.getElementById('them_ten').value)">Thêm</a>
			<?php
			echo "</td>
			<td width='100px' align='center'><a href='#'>Xóa</a></td>
		</tr>
	</table>
";
?>