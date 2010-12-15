<?php
$stt=$_GET['stt'];
echo "<table width='600px'>
		<tr height='20px'>
			<td width='100px' align='center'>$stt</td>
			<td width='300px' align='center'><input type='text' size='25' id='them_ten'/></td>
			<td width='100px' align='center'>";?><a href='#' onclick="themloaihangvaocsdl(document.getElementById('them_ten').value)">Thêm</a>
			<?php
			echo "</td>
			<td width='100px' align='center'><a href='#' onclick='themloaihang($stt)' >Xóa</a></td>
		</tr>
	</table>
";
?>