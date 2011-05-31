<?php 
require("../../../libraries/oop.php");
require("../../../libraries/user.php");
$stt=$_GET['stt'];
$iddh=time();
$user=new User;
$data=$user->listuser();

$ngaydat = date('d');
$thangdat = date('m');
$namdat = date('Y');
$dat = "$namdat-$thangdat-$ngaydat";

echo "<table>";
echo "<tr height='20px'>";
			echo "<td align=center width='50px'>$stt</td>";
			echo "<td align=center width='100px'><input type='text' name='iddh' value='$iddh' size='7' readonly='readonly'/></td>";
			echo "<td align=center width='100px'>";
				echo "<select name='user' id='user'>";
				foreach($data as $row){	
						echo "<option value='$row[Username]'><font color='#000000'>$row[Username]</font></option>;";
				}
				echo "</select>";			
			echo"</td>";
			echo "<td align=center width='70px'><input type='text' name='ngaydat' id='ngaydat' value='$dat' size='7' readonly='readonly'/></td>";
			echo "<td align=center width='70px'><input type='text' name='ngaygiao' id='ngaygiao' value='$dat' size='7'/></td>";
			echo "<td align=center width='80px'><input type='text' name='nguoinhan' id='nguoinhan' size='7' /></td>";
			echo "<td align=center width='100px'><input type='text' name='dienthoai' id='dienthoai' size='9' /></td>";
			echo "<td align=center width='100px'><input type='text' name='diadiem' id='diadiem' size='9' /></td>";
			
			echo "<td align=center width='100px'><input type='text' id='ghichu' size='10'/></td>";
			
			?>		
            	<td align=center width='30px'> <a href='#' onclick="themdonhangvaocsdl('<?php echo $iddh;?>',
                                                document.getElementById('user').value,
                                                document.getElementById('ngaydat').value,
                                                document.getElementById('ngaygiao').value,
                                                document.getElementById('nguoinhan').value,
                                                document.getElementById('dienthoai').value,
                                                document.getElementById('diadiem').value,
                                                document.getElementById('ghichu').value)" >Thêm</a></td>		
				<td align=center width='30px'> Sửa</td>
			<?php
			echo "<td align=center  width='30px'><a href='index.php?module=donhang')>Xóa</a></td>";
			echo "</tr>";
echo "</table>";

?>