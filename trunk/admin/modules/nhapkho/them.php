<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/phieunhap.php');
$stt=$_GET['stt'];
$ngaunhien=time();
$ngayhien=date("d-m-Y",$ngaunhien);
$ngaylay=date("Y-m-d",$ngaunhien);
echo "<table align='center'  width='800px' id='tableloaihang' >
		<tr height='20px'>
			<td width='50px' align='center'>$stt</td>
			<td width='100px' align='center'><input type='text' size='25' id='maphieu$stt' readonly='readonly' value='$ngaunhien' /></td>
			<td width='100px' align='center'><input type='text' size='25' id='ngaynhap$stt' readonly='readonly' value='$ngayhien'/></td>
			<td width='100px' align='center'><input type='text' size='25' id='tongtien$stt' value='0' readonly='readonly' class='num'/></td>
			<td width='150px' align='center'><input type='text' size='25' id='ghichu$stt'/></td>
			<td width='100px' align='center'>Chi Tiết</td>";?>
			<td width='100px' align='center'><a href='#' onclick="themphieunhapvaocsdl(document.getElementById('maphieu<?php echo $stt;?>').value,document.getElementById('ghichu<?php echo $stt;?>').value)">Thêm</a></td>
<td width='100px' align='center'><a href='#' onclick="list(nhapkho)">Xóa</a></td>			
		</tr>
	</table>