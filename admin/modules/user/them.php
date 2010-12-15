<?php
$stt=$_GET['stt'];
echo "<table width='600px'>
		<tr height='20px'>
			<td width='100px' align='center'>$stt</td>
			<td width='150px' align='center'><input type='text' size='25' id='them_ten'/></td>
			<td width='150px' align='center'><select id='them_lv'> ";
		?>
			<option value='2'>Admin</option>
            <option value='1'>User</option>
            <?php
		
		echo "</select></td>
			<td width='100px' align='center'>Chi Tiết</td>
			<td width='100px' align='center'>";?><a href='#' onclick="themuservaocsdl(document.getElementById('them_ten').value,document.getElementById('them_lv').value)">Thêm</a>
			<?php
			echo "</td>
			<td width='100px' align='center'><a href='#' onclick=list('user')>Xóa</a></td>
		</tr>
	</table>
";
?>